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

class PriceController extends Controller
{
    public function index($id)
    {
        $item = Item::with('photos','category','grade','brand')->where('uuid', $id)->first();

        return view('sales.index', compact('item'));
    }
}
