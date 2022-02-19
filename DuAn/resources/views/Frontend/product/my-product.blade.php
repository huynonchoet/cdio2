@extends('Frontend.layouts.app-front')

@section('content')
<div class="table-responsive">
    @if(session()->get('product') == 0)
        <h3>Bạn chưa có sản phẩm nào</h3>
    @endif
    @if(session()->get('product') != 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td>   <?php $picture = json_decode($data->image,true); { ?>
                    <img style="width:100px" src="{{ asset('upload/product/'.$data->id_member.'/'.$picture[0]) }} " >
                    <?php } ?>
                </td>
                <td>{{$data->price}}</td>
                <td>
                    <a href="edit-product/{{$data->id}}" class="btn btn-primary">Edit</a>
                    <a href="delete-product/{{$data->id}}" class="btn btn-dangers">Delete</a>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<a style="margin-left : 800px" href="{{route('add.product')}}" class="btn btn-primary">ADD NEW</a>
@endsection