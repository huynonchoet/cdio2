@extends('admin.layouts.app')

@section('content')
<label for="">Title(*)</label>
<br>
<form method="post">
    @csrf
    <input type="text" name="name">
    <br>
    <br>
    <br>
    <button class="btn btn-success">ADD COUNTRY</button>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
        {{session('success')}}
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