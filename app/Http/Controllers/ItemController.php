<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function index(){
        $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','is_featured')->orderBy('created_at','desc')->get();
        return $items;
    }

    public function oldfirst()
    {
        $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','is_featured')->orderBy('created_at','asc')->get();
        return $items;
    }

    public function pricelimit($min = null, $max = null)
    {
        if ($min != null && $max != null) {
          $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','is_featured')->whereBetween('sale_price',[$min, $max])->get();
        }elseif ($min != null && $max == null) {
          $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','is_featured')->where('sale_price','>=',$min)->get();
        }elseif ($min == null && $max != null) {
          $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','is_featured')->where('sale_price','<=',$max)->get();
        }

        return $items;
    }

    public function indexbyseller($id){
      $items = Item::select('id','name','actual_price','sale_price','seller_id','brand_name','created_at','is_featured')->where('seller_id', $id)->get();

      return $items;
    }

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

        return $item->id;
    }

    public function storeitemimage(Request $request, $itemid){

        Storage::putFile('public',$request->file('image'));
        $file_url = Storage::url($request->file('image')->hashName());

        $item = Item::find($itemid);
        $item->image = $file_url;
        $item->save();

        return json_encode($item->image);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return $item;
    }

    public function update(StoreItemRequest $request, $id)
    {
        $item = Item::find($id);
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

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return "Item deleted Successfully";
    }
}
