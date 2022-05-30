<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QrCode;
use App\Item;
use App\Category;
use App\Grade;
use App\Brand;
use App\QrItem;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('master data');
        $categories = Category::all();
        $grades = Grade::all();
        $brands = Brand::all();
        $items = Item::query();

        if ($request->has('category')) {
            if ($request->category != "") {
                $items->where('category_id', $request->category);
            }
        }

        if ($request->has('grade')) {
            if ($request->grade != "") {
                $items->where('grade_id', $request->grade);
            }
        }

        if ($request->has('brand')) {
            if ($request->brand != "") {
                $items->where('brand_id', $request->brand);
            }
        }

        if ($request->has('is_sold')) {
            if ($request->is_sold != "") {
                $items->where('is_sold', $request->is_sold);
            }
        }

        $items = $items->get();

        return view('master.items.index', compact('items','categories','grades','brands'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $grades = Grade::all();
        $brands = Brand::all();

        $item = Item::find($id);
        return view('master.items.create', compact('item','categories','grades','brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $item = Item::find($id)->update($request->all());

        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        $item = Item::find($id)->delete();
        return back();
    }

    public function print(Request $request)
    {
        $categories = Category::all();
        $grades = Grade::all();
        $brands = Brand::all();
        $items = Item::query();

        if ($request->has('category')) {
            if ($request->category != "") {
                $items->where('category_id', $request->category);
            }
        }

        if ($request->has('grade')) {
            if ($request->grade != "") {
                $items->where('grade_id', $request->grade);
            }
        }

        if ($request->has('brand')) {
            if ($request->brand != "") {
                $items->where('brand_id', $request->brand);
            }
        }

        if ($request->has('is_sold')) {
            if ($request->is_sold != "") {
                $items->where('is_sold', $request->is_sold);
            }
        }

        if ($request->has('date')) {
            if ($request->date != "") {
                $items->whereDate('created_at', $request->date);
            }
        }

        $items = $items->get();

        return view('master.items.print', compact('items','categories','grades','brands'));
    }

    public function print_preview(Request $request)
    {
        $qr_id = Item::whereIn('id', $request->item)->pluck('qr_id');

        $qr_codes = QrItem::whereIn('id', $qr_id)->get();

        return view('master.items.print_preview', compact('qr_codes'));
    }

    public function import()
    {
        return view('master.items.import');
    }

    public function store(Request $request)
    {
        $errors = new Collection;
        if ($request->input('submit') != null ){
            $file = $request->file('file');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            $location = 'uploads';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            $file = fopen($filepath,"r");

            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $the_big_Array[] = $filedata;

                $num = count($filedata );

                if($i == 0){
                $i++;
                continue;
                }
                for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            
            foreach ($the_big_Array as $key => $value) {
                if ($key != 0) {
                    $code = Item::where('code', $value[0])->first();

                    if (!$code) {
                        $grade = Grade::where('name', strtoupper($value[1]))->first();
                        $category = Category::where('name', strtoupper($value[2]))->first();
                        $brand = Brand::where('name', strtoupper($value[3]))->first();

                        if (!$grade) {
                            $grade = Grade::create(['name' => strtoupper($value[1])]);
                        }

                        if (!$category) {
                            $category = Category::create(['name' => strtoupper($value[2])]);
                        }

                        if (!$brand) {
                            $brand = Brand::create(['name' => strtoupper($value[3])]);
                        }

                        $item = Item::create([
                            'uuid' => Str::uuid(),
                            'code' => $value[0],
                            'grade_id' => $grade->id,
                            'category_id' => $category->id,
                            'brand_id' => $brand->id,
                            'colour' => $value[4],
                            'size' => $value[5],
                            'price' => $value[6] == "" ? 0 : $value[6],
                            'reseller_price' => $value[7] == "" ? 0 : $value[7],
                            'remark' => $value[8],
                        ]);

                        //$num = self::lastSequence();
                        $code = url('/').'/price/'.$item->uuid;
                        $qr_item = QrItem::create([
                            'code' => $code
                        ]);

                        $item->update([
                            'qr_id' => $qr_item->id
                        ]);                     
                    } else {
                        $errors->push([
                            'row_number' => $key,
                            'message' => 'duplicate item code'
                        ]);
                    }
                }
            }      
        }

        $flash_notification = [
            'total_success' => count($the_big_Array) - 1 - count($errors),
            'total_error' => count($errors),
            'errors' => $errors
        ];

        return back()->with(['flash_notification' => $flash_notification]);
    }

    public static function lastSequence()
    {
        $qr = QrItem::orderBy('id', 'DESC')->first();
        if ($qr) {
            $num = $qr->id + 1;
        } else {
            $num = 1;
        }

        return $num;
    }

    public function show(Category $category)
    {
        return view('', compact('category'));
    }
}
