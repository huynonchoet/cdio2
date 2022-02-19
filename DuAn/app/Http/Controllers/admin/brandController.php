<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\brand;
class brandController extends Controller
{
    public function index()
    {
        $value = brand::paginate(4);
        return view('admin.brand.brand',compact('value'));
    }
    public function add(){
        return view('admin.brand.addBrand');
    }
    public function store(Request $request)
    {
        $category = new brand();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin-brand')->with('message','Active successfully');
    }
    public function destroy($id)
    {
       
        brand::where('id',$id)->delete();
        
        return redirect()->route('admin-brand')->with('add','Active successfully');
    }
}
