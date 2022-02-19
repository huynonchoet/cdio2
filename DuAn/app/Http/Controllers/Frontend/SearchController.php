<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\products;
use App\category;
use App\brand;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    public function search(){
        $category = category::all();
        $brand = brand::all();
        $product = products::limit(4)->orderBy('created_at','desc')->get();
        return view('Frontend.search',compact('product','category','brand'));
    }
    public function search_advance(Request $request){
        $category = category::all();
        $brand = brand::all();
        // print_r($request->all());
        $flag = 0;
        $price = explode('-',$request->price);
            $product = products::query();
            if($request->search !=null){
                $product->where('name', 'LIKE', '%' . $request->search . '%');
                $flag =1;
            }
            if($request->price !=null){
                $product->whereBetween('price',[$price[0],$price[1]]);
                $flag =1;
            }
            if($request->category!=null){
                $product->where('category',$request->category);
                $flag = 1;
            }
            if($request->brand!=null){
                $product->where('brand',$request->brand);
                $flag = 1;
            }
            if($flag == 1){
                $product = $product->get();
            } else {
                $product = DB::table('products')->paginate(4);
            }
        return view('Frontend.search',compact('product','category','brand'));
    }
    public function search_range(Request $request){
        $min = (int)$request->min[0];
        $max = (int)$request->max[0];
        $product = DB::table('products')->whereBetween('price',[$min,$max])->get();
        return response()->json(['product' => $product]); 
    }
}
