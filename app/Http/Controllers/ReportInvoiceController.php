<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceItem;
use App\Item;
use App\Customer;
use App\Category;
use App\Grade;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReportInvoiceController extends Controller
{
    public function index(Request $request){

    	
    	$invoices = Invoice::latest();
        
        // $date = Invoice::get()->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('d');
        // });

        // $month = Invoice::get('created_at')->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('m');
        // });

        // $year = Invoice::get()->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('Y');
        // });

        $customers = Customer::all();

        $categories = Category::all();

        $grades = Grade::all();

        $brand = Brand::all();


        if ($request->has('start_date')) {
        	$start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
			$end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


        	$invoices->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
            	->orwhereBetween('created_at',array($start_date,$end_date));
        }

        if ($request->has('customer')) {
        	if ($request->customer != "all") {
                $invoices->where('customer_id', '=', $request->customer);
            }
        }

        if ($request->has('transaction_type')) {
            if ($request->transaction_type != "all") {
                $invoices->where('type', '=', $request->transaction_type);
            }
        }

        if ($request->has('payment_method')) {
            if ($request->payment_method != "all") {
                $invoices->where('payment_method', '=', $request->payment_method);
            }
        }

        // if ($request->has('date')) {
        //     if ($request->date != "") {
        //         $invoices->whereDay('created_at', '=', $request->date);
        //     }
        // }

        // if ($request->has('month')) {
        //     if ($request->month != "") {
        //         $invoices->whereMonth('created_at', '=', $request->month);
        //     }
        // }

        // if ($request->has('year')) {
        //     if ($request->year != "") {
        //         $invoices->whereYear('created_at', '=', $request->year);
        //     }
        // }

        //$invoices;

        $invoices = $invoices->groupBy('payment_method')
        ->with(['invoices_by_payment_method' => function($query) use ($request) {
            if ($request->has('start_date')) {
                $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


                $query->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
                    ->orwhereBetween('created_at',array($start_date,$end_date));
            }

            if ($request->has('customer')) {
                if ($request->customer != "all") {
                    $query->where('customer_id', '=', $request->customer);
                }
            }

            if ($request->has('transaction_type')) {
                if ($request->transaction_type != "all") {
                    $query->where('type', '=', $request->transaction_type);
                }
            }

            if ($request->has('payment_method')) {
                if ($request->payment_method != "all") {
                    $query->where('payment_method', '=', $request->payment_method);
                }
            }
            return $query;
        }])
        ->get();

	    if ($request->has('report_type')) {
			if ($request->report_type == 'report_item') {
                $invoices = Invoice::with('items')
                
                ->whereHas('items', function ($query) use ($request) {
                    // if ($request->has('start_date')) {
                    //     $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                    //     $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


                    //     $query->where([['items.updated_at','<=',$start_date],['items.updated_at','>=',$end_date]])
                    //         ->orwhereBetween('items.updated_at',array($start_date,$end_date));
                    // }

                    if ($request->has('category')) {
                        if ($request->category != "all") {
                            $query->where('category_id', '=', $request->category);
                        }
                    }

                    if ($request->has('grade')) {
                        if ($request->grade != "all") {
                            $query->where('grade_id', '=', $request->grade);
                        }
                    }
                    return $query->where('is_sold',1);
                })
                ->with(['invoices_by_payment_method' => function($query) use ($request) {
                    return 
                    $query->with(['items' => function($query) use ($request) {
                        // if ($request->has('start_date')) {
                        //     $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                        //     $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');

                        //     $query->where([['items.updated_at','<=',$start_date],['items.updated_at','>=',$end_date]])
                        //         ->orwhereBetween('items.updated_at',array($start_date,$end_date));
                        // }

                        if ($request->has('category')) {
                            if ($request->category != "all") {
                                $query->where('category_id', '=', $request->category);
                            }
                        }

                        if ($request->has('grade')) {
                            if ($request->grade != "all") {
                                $query->where('grade_id', '=', $request->grade);
                            }
                        }
                        return $query;
                    }]);
                }])
                //->orderBy('payment_method');;
                ->groupBy('payment_method');

                if ($request->has('start_date')) {
                    $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                    $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


                    $invoices->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
                        ->orwhereBetween('created_at',array($start_date,$end_date));
                }
                
                $invoices = $invoices->get();

                //dd($invoices);
                //dd($invoices);
				// $invoices = Item::where('is_sold',1);

				// if ($request->has('start_date')) {
		  //       	$start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
				// 	$end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


		  //       	$invoices->where([['updated_at','<=',$start_date],['updated_at','>=',$end_date]])
		  //           	->orwhereBetween('updated_at',array($start_date,$end_date));
		  //       }

		  //       if ($request->has('category')) {
		  //       	if ($request->category != "all") {
		  //               $invoices->where('category_id', '=', $request->category);
		  //           }
		  //       }

		  //       if ($request->has('grade')) {
		  //       	if ($request->grade != "all") {
		  //               $invoices->where('grade_id', '=', $request->grade);
		  //           }
		  //       }

		  //       // if ($request->has('brand')) {
		  //       // 	if ($request->brand != "all") {
		  //       //         $invoices->where('brand_id', '=', $request->brand);
		  //       //     }
		  //       // }

		  //       $invoices = $invoices->get();

			}
    	}



        return view('invoices.report.index', compact('invoices','customers', 'categories', 'grades', 'brand'));
    }

    public function print_report_invoice_customer(Request $request)
    {
    	$invoices = Invoice::latest();
        
        $customers = Customer::all();


        if ($request->has('start_date')) {
        	$start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
			$end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


        	$invoices->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
            	->orwhereBetween('created_at',array($start_date,$end_date));
        }

        if ($request->has('transaction_type')) {
            if ($request->transaction_type != "all") {
                $invoices->where('type', '=', $request->transaction_type);
            }
        }

        if ($request->has('customer')) {
        	if ($request->customer != "all") {
                $invoices->where('customer_id', '=', $request->customer);
            }
        }

        if ($request->has('payment_method')) {
            if ($request->payment_method != "all") {
                $invoices->where('payment_method', '=', $request->payment_method);
            }
        }

        $invoices = $invoices->groupBy('payment_method')
        ->with(['invoices_by_payment_method' => function($query) use ($request) {
            if ($request->has('start_date')) {
                $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


                $query->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
                    ->orwhereBetween('created_at',array($start_date,$end_date));
            }

            if ($request->has('customer')) {
                if ($request->customer != "all") {
                    $query->where('customer_id', '=', $request->customer);
                }
            }

            if ($request->has('transaction_type')) {
                if ($request->transaction_type != "all") {
                    $query->where('type', '=', $request->transaction_type);
                }
            }

            if ($request->has('payment_method')) {
                if ($request->payment_method != "all") {
                    $query->where('payment_method', '=', $request->payment_method);
                }
            }
            return $query;
        }])
        ->get();

        return view('invoices.report.print_invoice_customer', compact('invoices','customers'));
    }

    public function print_report_invoice_item(Request $request) 
    {
    	$invoices = Invoice::with('items')        
        ->whereHas('items', function ($query) use ($request) {
            // if ($request->has('start_date')) {
            //     $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
            //     $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


            //     $query->where([['items.updated_at','<=',$start_date],['items.updated_at','>=',$end_date]])
            //         ->orwhereBetween('items.updated_at',array($start_date,$end_date));
            // }

            if ($request->has('category')) {
                if ($request->category != "all") {
                    $query->where('category_id', '=', $request->category);
                }
            }

            if ($request->has('grade')) {
                if ($request->grade != "all") {
                    $query->where('grade_id', '=', $request->grade);
                }
            }
            return $query->where('is_sold',1);
        })
        ->with(['invoices_by_payment_method' => function($query) use ($request) {
            return 
            $query->with(['items' => function($query) use ($request) {
                // if ($request->has('start_date')) {
                //     $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
                //     $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');

                //     $query->where([['items.updated_at','<=',$start_date],['items.updated_at','>=',$end_date]])
                //         ->orwhereBetween('items.updated_at',array($start_date,$end_date));
                // }

                if ($request->has('category')) {
                    if ($request->category != "all") {
                        $query->where('category_id', '=', $request->category);
                    }
                }

                if ($request->has('grade')) {
                    if ($request->grade != "all") {
                        $query->where('grade_id', '=', $request->grade);
                    }
                }
                return $query;
            }]);
        }])
        //->orderBy('payment_method');;
        ->groupBy('payment_method');

        if ($request->has('start_date')) {
            $start_date = Carbon::parse("$request->start_date 00:00:00")->format('Y-m-d H:i:s');
            $end_date = Carbon::parse("$request->end_date 23:59:59")->format('Y-m-d H:i:s');


            $invoices->where([['created_at','<=',$start_date],['created_at','>=',$end_date]])
                ->orwhereBetween('created_at',array($start_date,$end_date));
        }
        
        $invoices = $invoices->get();

        return view('invoices.report.print_invoice_item', compact('invoices'));
    }
}
