<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
class categoryController extends Controller
{
    public function index()
    {
        $value = category::paginate(4);
        return view('admin.category.category',compact('value'));
    }
    public function add(){
        return view('admin.category.addCategory');
    }
    public function store(Request $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin-category')->with('message','Active successfully');
    }
    public function destroy($id)
    {
       
        category::where('id',$id)->delete();
        
        return redirect()->route('admin-category')->with('add','Active successfully');
    }
}
