<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Item;

class ItemController extends Controller
{
    public function store(StoreItemRequest $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->actual_price = $request->actual_price;
        $item->sale_price = $request->sale_price;
        $item->offer_start_date = $request->offer_start_date;
        $item->offer_end_date = $request->offer_end_date;
        $item->quantity = $request->quantity;
        $item->offer_description = $request->offer_description;
        $item->seller_id = auth()->user()->id;
        $item->brand_name = $request->brand_name;
        $item->product_origin_page = $request->product_origin_page;
        $item->catagory = $request->catagory;
        $item->sub_catagory_1 = $request->sub_catagory_1;
        $item->sub_catagory_2 = $request->sub_catagory_2;
        $item->sub_catagory_3 = $request->sub_catagory_3;
        $item->keywords = $request->keywords;
        $item->is_featured = $request->is_featured;

        $item->save();

        return $item;

    }
}
