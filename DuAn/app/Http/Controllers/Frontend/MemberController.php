<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\countries;
use App\category;
use App\brand;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\MemberLoginRequest;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = countries::all();
        $category = category::all();
        $brand = brand::all();
        return view('Frontend.member.register',compact('data','category','brand'));
    }
    public function log(){
        $category = category::all();
        $brand = brand::all();
        return view('Frontend.member.login',compact('category','brand'));
    }
    public function register(RegisterRequest $request)
    {
        $register = new users();
        $file = $request->avatar;
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->phone = $request->phone;
        if(!empty($file)){
            $register->avatar = $file->getClientOriginalName();
        }
        $register->country = $request->input('ct');
        $register->save();
        if($register->save())
        {
            if(!empty($file)){
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
            }
            return redirect()->back()->with('message','Active success!');
        } 
        else
        {
            return redirect()->back()->with('message','Active failed!');
        }
        
    }
    public function login(MemberLoginRequest $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = false ;
        $state = 1;
        // Hàm attempt để kiểm tra thông tin
        if(Auth::attempt($login)){
            $id = Auth::id();
            $user = Auth::user();
            Auth::login($user);
            $request->session()->put('id',$id);
            $request->session()->put('state',1);
            if($user->level == 1){
                return redirect('admin/dashboard');
            }
            return redirect()->route('index');
        } else {
            return redirect()->back()->withErrors('Email hoặc mật khẩu không đúng');
        }
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
