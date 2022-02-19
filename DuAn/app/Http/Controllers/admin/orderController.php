<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\detail_order;
use App\products;
use DB;
class orderController extends Controller
{
    public function index(){
        $value  = order::where('approved',0)->get();
        return view('admin.order.order',compact('value'));
    }
    public function app(){
        $value  = order::where('approved',1)->get();
        return view('admin.order.order',compact('value'));
    }
    public function detail($id){
        $value1 = detail_order::join('product', 'detail_order.id_product','=','product.id')->where('detail_order.id_order',$id)->get(['product.name','product.image','detail_order.amount','product.id_user','detail_order.id_order']);
        $value = json_decode($value1);
        return view('admin.order.detail-order',compact('value','id'));
    }
    public function approved($id){
        $order = order::find($id);
        $order->id_user = $order->id_user;
        $order->address = $order->address;
        $order->phone = $order->phone;
        $order->day = $order->day;
        $order->approved = 1;
        $order->save();
        $value  = order::where('approved',0)->get();
        return view('admin.order.order',compact('value'))->with("success","active success");
    }
    public function delete($id){
        $order = order::where('id', $id)->delete();
        return back()->with("success","active success");
    }
}
