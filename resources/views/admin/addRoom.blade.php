@extends('layouts.adminsona')
@section('content')
<div class="container">
	<h3>Promotion Code</h3><br>
	@if(session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{session('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<form action="{{route('adminEditRoom.store')}}" class="contact-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-4">Name:
                @if($errors->has('name'))
                <span class="text-danger"><small>{{$errors->first('name')}}</small></span>
                @endif
                <input type="text" name="name" placeholder="Promo Name" class="@if($errors->has('name')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Price:
                @if($errors->has('price'))
                <span class="text-danger"><small>{{$errors->first('price')}}</small></span>
                @endif
                <input type="text" name="price" placeholder="Room Price" class="@if($errors->has('price')) is-invalid border-danger @endif">
            </div>

            <div class="col-lg-4">Size:
                @if($errors->has('size'))
                <span class="text-danger"><small>{{$errors->first('size')}}</small></span>
                @endif
                <input type="text" name="size" placeholder="Room Size" class="@if($errors->has('size')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Bed:
                @if($errors->has('bed'))
                <span class="text-danger"><small>{{$errors->first('bed')}}</small></span>
                @endif
                <input type="text" name="bed" placeholder="Room Bed" class="@if($errors->has('bed')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Capacity:
                @if($errors->has('capacity'))
                <span class="text-danger"><small>{{$errors->first('capacity')}}</small></span>
                @endif
                <input type="text" name="capacity" placeholder="Room Capacity" class="@if($errors->has('capacity')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Service:
                @if($errors->has('service'))
                <span class="text-danger"><small>{{$errors->first('service')}}</small></span>
                @endif
                <input type="text" name="service" placeholder="Room Service" class="@if($errors->has('service')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Photo 1:
                @if($errors->has('photo_1'))
                <span class="text-danger"><small>{{$errors->first('photo_1')}}</small></span>
                @endif
                <input type="file" name="photo_1" class="@if($errors->has('photo_1')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Photo 2:
                @if($errors->has('photo_2'))
                <span class="text-danger"><small>{{$errors->first('photo_2')}}</small></span>
                @endif
                <input type="file" name="photo_2" class="@if($errors->has('photo_2')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-4">Photo 3:
                @if($errors->has('photo_3'))
                <span class="text-danger"><small>{{$errors->first('photo_3')}}</small></span>
                @endif
                <input type="file" name="photo_3" class="@if($errors->has('photo_3')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-12">Description:
            	@if($errors->has('description'))
                <span class="text-danger"><small>{{$errors->first('description')}}</small></span>
                @endif
	            <textarea type="text" placeholder="Room Description" name="description" class="@if($errors->has('description')) is-invalid border-danger @endif"></textarea>
	            <button type="submit">Add Room</button>
	        </div>
        </div>
    </form><br><br>
	
</div>

@endsection