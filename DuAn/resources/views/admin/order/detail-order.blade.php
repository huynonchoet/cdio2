@extends('admin.layouts.app')

@section('content')
<label style="font-size: 25px; margin-top : 20px; font-weight: bold"> ADD PRODUCT</label>
<form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
    @csrf
    @foreach($value as $value)
        <div style=" min-height: 330px">
        <div class="form-group">
        <div class="col-md-12">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{$value->name}}" class="form-control form-control-line">
        </div>
    </div> 
    <div class="form-group">
        <div class="col-md-12">
            <label for="profile">Amount:</label>
            <input type="text" name='profile'  value="{{$value->amount}}" class="form-control form-control-line">
        </div>
    </div>
    <label for="img" style="margin:10px">Image:</label>
    <div class="form-group">
        <?php
            $img = json_decode($value->image, true);
        ?>
        <div class="col-md-12">
            
            @foreach($img as $image)
            <div class="img-group" style="float : left;margin-right : 20px">
                <img style="width:100px" src="<?php echo asset("upload/product/{$value->id_user}/$image") ?>" alt="">
                <br>    
            </div>
            @endforeach
        </div>
    </div>
    <br>
        </div>
    @endforeach
</br>
</form>
    <div class="form-group" style="margin-top : 100px;color:white">
        <div class="col-sm-12">
            <a href="{{url('admin/approve/'.$id)}}" class="btn btn-success">Approve</a>
        </div>
    </div>
@endsection