<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cashier;

class CashierController extends Controller
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
    public function index()
    {
        $this->authorize('master data');
        $cashiers = Cashier::all();

        return view('master.cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.cashiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $Cashier = Cashier::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);

        return redirect()->route('cashiers.index');
    }

    public function import()
    {
        return view('master.cashiers.import');
    }


    public function import_store(Request $request)
    {
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
                    $cashier = Cashier::create([
                        'name' => $value[0],
                    ]);
                }
            }      
        }

        // $flash_notification = [
        //     'total_success' => count($the_big_Array) - 1 - count($errors),
        //     'total_error' => count($errors),
        //     'errors' => $errors
        // ];

        return back()->with(['flash_notification' => 'success']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Cashier $cashier)
    {
        return view('', compact('cashier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashier $cashier)
    {
        return view('master.cashiers.create', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashier $cashier)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $cashier->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);

        return redirect()->route('Cashiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashier $cashier)
    {
        $cashier->delete();
        return back();
    }
}
