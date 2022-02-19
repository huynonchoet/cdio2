@extends('admin.layouts.app')

@section('content')
<div class="table-responsive">
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
            @foreach($data as $data1)
            <tr>
                <th scope="row">{{$data1->id}}</th>
                <td>{{$data1->name}}</td>
                <td>   <?php  $picture = json_decode($data1->image,true); { ?>
                    <img style="width:100px" src="{{ asset('upload/product/'.$data1->id_user.'/'.$picture[0]) }} " >
                    <?php } ?>
                </td>
                <td>{{$data1->price}}</td>
                <td>
                    <a href="edit-product/{{$data1->id}}" class="btn btn-primary">Edit</a>
                    <a href="delete-product/{{$data1->id}}" class="btn btn-dangers">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    {{$data->links()}}
</div>
<a style="margin-left : 940px" href="{{route('add.product')}}" class="btn btn-primary">ADD NEW</a>
@endsection