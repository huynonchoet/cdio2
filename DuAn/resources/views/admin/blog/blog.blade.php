@extends('admin.layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->title}}</td>
                <td>{{$data->image}}</td>
                <td>{{$data->description}}</td>
                <td>
                    <a href="editBlog/{{$data->id}}" class="btn btn-primary">Edit</a>
                    <a href="deleteBlog/{{$data->id}}" class="btn btn-dangers">Delete</a>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div style="margin-left:900px">
        {{$value->links()}}
    </div>
</div>


<a href="addBlog" class="btn btn-primary">ADD BLOG</a>
@endsection