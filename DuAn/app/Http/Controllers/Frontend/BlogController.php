<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\blogs;
use Illuminate\Support\Facades\DB;
use App\comments;
use App\users;
use App\rates;
class BlogController extends Controller
{
    public function index()
    {
        $data = DB::table('blogs')->orderBy('id','desc')->paginate(3);
        return view('Frontend.blog.blog',compact('data'));
    }
    public function single($id)
    {
        $data = blogs::find($id);
        $min = DB::table('blogs')->min('id');
        $max = DB::table('blogs')->max('id');
        $comment = DB::table('comments')->where('id_blog',$id)->get();
        $star = DB::table('rates')->avg('star');
        $rate = round($star,2);
        $state = null;
        if($id == $max){
            $state = 'max';
        }
        if($id == $min){
            $state = 'min';
        }
        $previous = blogs::where('id','<',$data->id)->max('id');
        $next = blogs::where('id','>',$data->id)->min('id');
        return view('Frontend.blog.blog-single',compact('data','previous','next','state','comment','rate'));
    }
    public function comment(Request $request){

        if(Auth::check()){
        $id = Auth::user()->id;
        $currentUser = users::find($id);
        $comment = new comments();
        $comment->id_user = $currentUser->id;
        $comment->user_name = $currentUser->name;
        $comment->user_avatar = $currentUser->avatar;
        $comment->id_blog = $request->id;
        $comment->content = $request->content;
        // kiểm tra nếu có reply thì đổi lv khác, không thì mặc định bằng 1
        if($request->has('reply')){
            $comment->level = $request->level;
        }
        $comment->save();
        return redirect()->back();
        }
    }
    public function rate(Request $request){
        $rate = new rates();
        $rate->id_user = Auth::user()->id;
        $rate->id_blog = $request->id_blog;
        $rate->star = $request->values;
        $rate->save();
    }
}
