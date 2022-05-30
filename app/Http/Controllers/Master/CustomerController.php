<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
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
        $customers = Customer::query();

        if ($request->has('is_reseller')) {
            if ($request->is_reseller != "") {
                $customers->where('is_reseller', $request->is_reseller);
            }
        }

        $customers = $customers->get();

        return view('master.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.customers.create');
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

        $customer = Customer::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'is_reseller' => $request->is_reseller ? 1 : 0
        ]);

        return redirect()->route('customers.index');
    }

    public function import()
    {
        return view('master.customers.import');
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
                    $customer = Customer::create([
                        'name' => $value[0],
                        'phone_number' => $value[1],
                        'email' => $value[2],
                        'is_reseller' => $value[3],
                        'join_date' => $value[3] == 1 ? date("Y-m-d") : Null,
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
    public function show(Customer $customer)
    {
        return view('', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('master.customers.create', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $customer->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'is_reseller' => $request->is_reseller ? 1 : 0,
            'join_date' => $request->is_reseller ? date("Y-m-d") : NULL
        ]);

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back();
    }
}
