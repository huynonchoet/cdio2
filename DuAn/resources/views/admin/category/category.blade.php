@extends('admin.layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td>
                    <a href="category/{{$data->id}}" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-left:900px">
        {{$value->links()}}
    </div>
   
</div>


<a href="{{route('add-cate')}}" class="btn btn-primary">ADD CATEGORY</a>
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection