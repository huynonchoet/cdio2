@extends('Frontend.layouts.app')

@section('content')
<div class="col-sm-4 col-sm-offset-1">
    <div class="login-form">
        <!--login form-->
        <h2>Login to your account</h2>
        <form method="post">
            @csrf
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <span>
                <input type="checkbox" class="checkbox">
                Keep me signed in
            </span>
            <button type="submit" class="btn btn-default">Login</button>
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
    <!--/login form-->
</div>
<!-- <div class="col-sm-1">
    <h2 class="or">OR</h2>
</div>
<div class="col-sm-4">
    <div class="signup-form">
       
        <h2>New User Signup!</h2>
        <form action="#">
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email Address" />
            <input type="password" placeholder="Password" />
            <button type="submit" class="btn btn-default">Signup</button>
        </form>
    </div>
    
</div> -->
@endsection