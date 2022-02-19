@extends('admin.layouts.app')

@section('content')
<label style="font-size: 25px; margin-top : 20px; font-weight: bold" > Create Blog</label>
<form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="col-md-12"> Title</label>
        <div class="col-md-12">
            <input type="text" name="title" class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Image</label>
        <div class="col-md-12">
            <input type="file" name="image" class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Description</label>
        <div class="col-md-12">
            <textarea rows="5" class="form-control form-control-line" name="description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Content</label>
        <div class="col-md-12">
            <textarea rows="5" class="form-control form-control-line" name='content' id='content1'></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-success">Create Blog</button>
        </div>
    </div>
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
