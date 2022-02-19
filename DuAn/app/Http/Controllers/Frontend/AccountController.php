<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\countries;
use App\users;
use Auth;
use App\Http\Requests\UpdateProfileRequest;
class AccountController extends Controller
{
    public function index(){
        $countries = countries::all();
        if(session()->has('id')){
            $id = session()->get('id');
        }
        $user = users::find($id);
        return view('Frontend.account.account',compact('countries','user'));
    }
    public function update(UpdateProfileRequest $request){
        $userId = Auth::id();
        $user = users::findOrFail($userId);
        $data = $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        } else {
            $data['avatar'] =$user->avatar;
        }
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        $data['country'] = $request->input('ct');
        if($user->update($data))
        {   
            if(!empty($file)){
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
            }
            return redirect()->route('user.account')->with('message','Active successfully');
        }
        else
        {
            return redirect()->route('user.account')->with('message','Active failed');
        }
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('login.member');
    }
}
