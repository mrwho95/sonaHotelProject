@extends('layouts.adminsona')
@section('content')

<div class="container">
	<h3>Admin Upload Data</h3><br><br>
	<form action="{{route('adminEditRoom.store')}}" class="contact-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">Name:
                @if($errors->has('name'))
                <span class="text-danger"><small>{{$errors->first('name')}}</small></span>
                @endif
                <input type="text" name="name" placeholder="Room Name" class="@if($errors->has('name')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Price:
                @if($errors->has('price'))
                <span class="text-danger"><small>{{$errors->first('price')}}</small></span>
                @endif
                <input type="text" name="price" placeholder="Room Price" class="@if($errors->has('price')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Size:
                @if($errors->has('size'))
                <span class="text-danger"><small>{{$errors->first('size')}}</small></span>
                @endif
                <input type="text" name="size" placeholder="Room Size" class="@if($errors->has('size')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Bed:
                @if($errors->has('bed'))
                <span class="text-danger"><small>{{$errors->first('bed')}}</small></span>
                @endif
                <input type="text" name="bed" placeholder="Room Bed" class="@if($errors->has('bed')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Capacity:
                @if($errors->has('capacity'))
                <span class="text-danger"><small>{{$errors->first('capacity')}}</small></span>
                @endif
                <div class="select-option">
                	<select name="capacity" class="@if($errors->has('capacity')) is-invalid border-danger @endif">
	                    <option value="Max Capacity 1 Adult">1 Adult</option>
	                    <option value="Max Capacity 2 Adults">2 Adults</option>
	                    <option value="Max Capacity 3 Adults">3 Adults</option>
	                    <option value="Max Capacity 4 Adults">4 Adults</option>
	                    <option value="Max Capacity 5 Adults">5 Adults</option>
	                </select>
                </div>
            </div>
            <div class="col-lg-6">Photo 1:
                @if($errors->has('photo_1'))
                <span class="text-danger"><small>{{$errors->first('photo_1')}}</small></span>
                @endif
            	<input type="file" name="photo_1" class="@if($errors->has('photo_1')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Photo 2:
                @if($errors->has('photo_2'))
                <span class="text-danger"><small>{{$errors->first('photo_2')}}</small></span>
                @endif
                <input type="file" name="photo_2" class="@if($errors->has('photo_2')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Photo 3:
                @if($errors->has('photo_3'))
                <span class="text-danger"><small>{{$errors->first('photo_3')}}</small></span>
                @endif
                <input type="file" name="photo_3" class="@if($errors->has('photo_3')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-12">Service:
                @if($errors->has('service'))
                <span class="text-danger"><small>{{$errors->first('service')}}</small></span>
                @endif
                <textarea type="text" name="service" placeholder="Room Service" class="@if($errors->has('service')) is-invalid border-danger @endif"></textarea>
            </div>
            <div class="col-lg-12">Description:
                @if($errors->has('description'))
                <span class="text-danger"><small>{{$errors->first('description')}}</small></span>
                @endif
                <textarea type="text" placeholder="Room Description" name="description" class="@if($errors->has('description')) is-invalid border-danger @endif"></textarea>
                <button type="submit">Add</button>
            </div>
            
        </div>
    </form><br><br>
    <h3>Display Room</h3>
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