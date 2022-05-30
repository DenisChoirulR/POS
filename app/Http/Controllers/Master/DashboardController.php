<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Grade;
use App\Brand;
use App\QrItem;
use App\Colour;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('master.dashboard');
    }

    public function store(Request $request)
    {
        if ($request->input('submit') != null ){
            $file = $request->file('file');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();




                    // Check file size
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
                        	$brand_id = Brand::where('name', $value[1])->value('id');
                        	$colour_id = Colour::where('name', $value[2])->value('id');
                        	$category_id = Category::where('name', $value[6])->value('id');
                        	$grade_id = Grade::where('name', $value[7])->value('id');
                            $item = Item::create([
                            	'qr_id' => $key+1,
                            	'code' => $value[0],
                            	'brand_id' => $brand_id,
                            	'colour_id' => $colour_id,
                            	'size' => $value[3],
                            	'price' => $value[4] == "" ? 0 : $value[4],
                            	'remark' => $value[5],
                            	'category_id' => $category_id,
                            	'grade_id' => $grade_id
                            ]);
                        } 

                        dd('success');       
            
        }
        return back();
    }
}
