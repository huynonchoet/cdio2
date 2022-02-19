<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\users;
use App\countries;
class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function profile()
    {
        $user = Auth::user();
        $countries = countries::All();
        return view('admin.user.page-profile',compact('user'),compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        $user = users::findOrFail($userId);
        $data = $request->all();
        $file = $request->avatar;
        // kiểm tra nếu file trống thì lấy avatar cũ, không thì lấy file mới
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        } else {
            $data['avatar'] =$user->avatar;
        }
        //tương tự phần file
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        // vì có select option nên phải dùng input
        $data['country'] = $request->input('ct');
        if($user->update($data))
        {   
            if(!empty($file)){
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
            }
            return redirect()->route('admin-profile')->with('message','Active successfully');
        }
        else
        {
            return redirect('/user/profile')->with('message','Active failed');
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
        //
    }
    public function qluser(){
        $value = users::where('level',0)->get();
        return view('admin.qluser.qluser',compact('value'));
    }
    public function deleteUser($id){
        users::where('id',$id)->delete();
        return back()->with("message","active success");
    }
}
