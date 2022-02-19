<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\blogs;
use App\Http\Requests\addBlog;
class BlogController extends Controller
{   
    
    public function index()
    {
       
    }
    public function main(){
        $value = blogs::paginate(4);
        return view('admin.blog.blog',compact('value'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addBlog $request)
    {
        $blog = new blogs();
        $file = $request->image;
        if(!empty($file)){
            $blog->image = $file->getClientOriginalName();
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        if($blog->save()){
            if(!empty($file)){
                $file->move('admin/blog',$file->getClientOriginalName());
            }
            return redirect()->route('admin-addBlog')->with('add','Active successfully');
        } else {
            return redirect('/addBlog')->with('add','Active failed');
        }
    }
    public function huy()
    {
        return view('admin.blog.addBlog');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = blogs::find($id);
        return view('admin.blog.editBlog',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addBlog $request, $id)
    {
        $blog = blogs::find($id);
        $blog->title = $request->title;
        $blog->image = $request->image;
        $blog->description = $request->description;
        $blog->content = $request->content;
        if($blog->update()){
            if(!empty($request->image)){
                $request->image->move('admin/blog',$request->image->getClientOriginalName());
            }
            return redirect('/blog')->with('add','Active successfully');
        } else {
            return redirect('/blog')->with('add','Active failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blogs::where('id',$id)->delete();
        
        return redirect()->route('all-blog')->with('add','Active successfully');
    }
}