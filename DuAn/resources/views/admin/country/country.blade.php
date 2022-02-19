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
                    <a href="country/{{$data->id}}" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-left:900px">
        {{$value->links()}}
    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>


<a href="{{route('add-country')}}" class="btn btn-primary">ADD COUNTRY</a>
@endsection