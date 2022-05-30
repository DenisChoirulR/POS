<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Grade;
use App\Brand;
use App\QrItem;
use App\Item;
use App\Photo;
use Image;

class QualityControlController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$grades = Grade::all();
    	$brands = Brand::all();

        return view('quality_control.index', compact('categories','grades','brands'));
    }

    public function scan(Request $request)
    {
        return view('quality_control.scan');
    }

    public function create(Request $request)
    {
    	//dd($request->all());
    	$request = $request->all();

        return view('quality_control.create', compact('request'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$qr_id = QrItem::where('code', $request->code)->value('id');
    	$item = Item::create([
    		'qr_id' => $qr_id,
    		'category_id' => $request->category,
    		'grade_id' => $request->grade,
    		'brand_id' => $request->brand,
    		'price' => $request->price,
    		'name' => $request->name,
    		'description' => $request->description
    	]);

        if ($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $file)
            {
                $name = time().'.'.$file->extension();

                Image::make($file)->resize(400, 400)->save(public_path().'/images/'.$name, 80);
                $photo = Photo::create([
                    'item_id' => $item->id,
                    'url' => 'image/'.$name
                ]);
            }
        }

        return redirect(route('qc.scan',array('category' => $request->category, 'grade' => $request->grade, 'brand' => $request->brand)));
    }

    public function check_item(Request $request)
    {
    	$qr_item = QrItem::where('code', $request->code)->first();

        return $qr_item;
    }
}
