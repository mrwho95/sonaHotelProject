@extends('layouts.adminsona')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3>Admin Edit Room Data</h3>
        </div>
        <div class="col-lg-6 ml-auto mr-3">
            <!-- <button type="button" class="btn btn-warning">BACK<a href="{{route('adminEditRoom.index')}}" class="btn btn-"></a></button> -->
            <a href="{{route('adminEditRoom.index')}}" class="btn btn-warning">CANCEL EDIT</a>
        </div>
    </div>
	<br><br>
	<form action="{{route('adminEditRoom.update', $data->id)}}" class="contact-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">Name:
                @if($errors->has('name'))
                <span class="text-danger"><small>{{$errors->first('name')}}</small></span>
                @endif
                <input type="text" name="name" placeholder="Room Name" class="@if($errors->has('name')) is-invalid border-danger @endif" value="{{$data->name}}">
            </div>
            <div class="col-lg-6">Price:
                @if($errors->has('price'))
                <span class="text-danger"><small>{{$errors->first('price')}}</small></span>
                @endif
                <input type="text" name="price" placeholder="Room Price" class="@if($errors->has('price')) is-invalid border-danger @endif" value="{{$data->price}}">
            </div>
            <div class="col-lg-6">Size:
                @if($errors->has('size'))
                <span class="text-danger"><small>{{$errors->first('size')}}</small></span>
                @endif
                <input type="text" name="size" placeholder="Room Size" class="@if($errors->has('size')) is-invalid border-danger @endif" value="{{$data->size}}">
            </div>
            <div class="col-lg-6">Bed:
                @if($errors->has('bed'))
                <span class="text-danger"><small>{{$errors->first('bed')}}</small></span>
                @endif
                <input type="text" name="bed" placeholder="Room Bed" class="@if($errors->has('bed')) is-invalid border-danger @endif" value="{{$data->bed}}">
            </div>
            <div class="col-lg-6">Capacity:
                @if($errors->has('capacity'))
                <span class="text-danger"><small>{{$errors->first('capacity')}}</small></span>
                @endif
                <div class="select-option">
                	<select name="capacity" class="@if($errors->has('capacity')) is-invalid border-danger @endif" value="{{$data->capacity}}">
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
                <textarea type="text" name="service" placeholder="Room Service" class="@if($errors->has('service')) is-invalid border-danger @endif">{{$data->service}}</textarea>
            </div>
            <div class="col-lg-12">Description:
                @if($errors->has('description'))
                <span class="text-danger"><small>{{$errors->first('description')}}</small></span>
                @endif
                <textarea type="text" placeholder="Room Description" name="description" class="@if($errors->has('description')) is-invalid border-danger @endif">{{$data->description}}</textarea>
                <button type="submit">Update</button>
            </div>
        </div>
    </form><br><br>
</div>
@endsection