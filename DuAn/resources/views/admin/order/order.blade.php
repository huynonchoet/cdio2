@extends('admin.layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Day</th>
                <th scope="col">Detail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{date('d-m-Y',$data->day)}}</td>
                <td>
                    <a href="{{route('order-detail',$data->id)}}" class="btn btn-primary">Detail</a>
                </td>
                <td>
                    <a href="{{route('order-delete',$data->id)}}" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('approved')}}" class="btn btn-primary">Approved List</a>
</div>
@endsection