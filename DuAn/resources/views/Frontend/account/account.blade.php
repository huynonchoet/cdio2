@extends('Frontend.layouts.app-front')

@section('content')
<h2>Update User</h2>
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="col-md-12">Full Name</label>
        <div class="col-md-12">
            <input type="text" name="name" class="form-control form-control-line" value="{{$user->name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="example-email" class="col-md-12">Email</label>
        <div class="col-md-12">
            <input type="email" name="email" class="form-control form-control-line" id="example-email"
                value="{{$user->email}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Password</label>
        <div class="col-md-12">
            <input type="password" name="password" class="form-control form-control-line" placeholder="*********">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Phone No</label>
        <div class="col-md-12">
            <input type="text" name="phone" class="form-control form-control-line" value="{{$user->phone}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Address</label>
        <div class="col-md-12">
            <input type="text" name="address" class="form-control form-control-line" value="{{$user->address?$user->address:''}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Avatar</label>
        <div class="col-md-12">
            <input type="file" name="avatar" class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12">Select Country</label>
        <div class="col-sm-12">
            <select class="form-control form-control-line" name="ct">
                @foreach($countries as $data)
                <option value="{{$data->id}}" {{$user->country == $data->id?'selected':''}}>{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
        {{session('message')}}
    </div>
    @endif

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
@endsection