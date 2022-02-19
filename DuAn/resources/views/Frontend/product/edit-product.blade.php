@extends('Frontend.layouts.app-front')

@section('content')
<label style="font-size: 25px; margin-top : 20px; font-weight: bold"> ADD PRODUCT</label>
<form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
    @csrf
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
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" name="name" placeholder="{{$product->name}}" value="{{$product->name}}"
                class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" name="price" placeholder="{{$product->price}}" value="{{$product->price}}"
                class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <select class="form-control form-control-line" name="category">
                <option hidden>please choose category</option>
                @foreach($cate as $data)
                <option value="{{$data->id}}" {{$product->category == $data->id ?'selected' : ""}}>{{$data->name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <select class="form-control form-control-line" name="brand">
                <option hidden>please choose brand</option>
                @foreach($brand as $data)
                <option value="{{$data->id}}" {{$product->brand == $data->id ?'selected' : ""}}>{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <select class="form-control form-control-line" id="loai">
                <option value="1" {{$product->sale ? 'selected' : ''}} >new</option>
                <option value="2" {{$product->sale ? 'selected' : ''}}>sale</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?php if($product->sale!=0) { ?>
            <input type="text" id="sale" name="sale" placeholder='0' value="{{$product->sale}}">%
            <?php } ?>
            <?php if($product->sale==0) { ?>
            <input type="text" id="sale" name="sale" placeholder='0' value="0" style="display:none">%
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" name='profile' placeholder="{{$product->profile}}" value="{{$product->profile}}" class="form-control form-control-line">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="file" name="files[]" placeholder="files" multiple class="form-control form-control-line">
        </div>
    </div>
    <div>
        <?php
            $img = json_decode($product->image, true);
        ?>
        <div class="col-md-12">
            @foreach($img as $image)
            <div class="img-group" style="float : left;margin-right : 20px">
                <img style="width:100px" src="<?php echo asset("upload/product/{$product->id_member}/$image") ?>" alt="">
                <br>    
                <input type="checkbox" value="{{$image}}" name = "hinhanh[]">
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <textarea rows="5" class="form-control form-control-line" name='detail' placeholder="{{$product->details}}" value="{{$product->profile}}"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-success">UPDATE</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $('select#loai').change(function() {
        var select = $(this).children("option:selected").val();
        if (select == "2") {
            $("input#sale").show();
        } else {
            $("input#sale").hide();
        }
    })
})
</script>
@endsection