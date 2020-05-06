@extends('layouts.adminsona')
@section('content')

<div class="container">
    <h3>Display Room</h3><br>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Bed</th>
                <th>Capacity</th>
                <th>Service</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($data as $value)
                <tr>
                    <td><img src="{{asset('uploads/roomPhoto/'.$value->photo_1)}}" width="200px" height="200px" alt="image"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->size}}</td>
                    <td>{{$value->bed}}</td>
                    <td>{{$value->capacity}}</td>
                    <td>{{$value->service}}</td>
                    <td>{{$value->description}}</td>
                    <td><a href="{{route('adminEditRoom.edit', $value->id)}}" class="btn btn-warning">Edit</a>
                        <a href="javascript::void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                        <form action="{{route('adminEditRoom.destroy', $value->id)}}" method='post'>
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection