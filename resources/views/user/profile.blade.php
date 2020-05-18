@extends('layouts.sona')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			@if(session('success'))
		    <div class="alert alert-success alert-dismissible fade show" role="alert">
		        {{session('success')}}
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    @endif
			<h3>Customer's Profile Overview</h3><hr>
			<div class="row">
				<div class="col-lg-3">
					<img src="{{asset('uploads/userPhoto/'.$data->userphoto)}}" style="width:200px; height:200px; border-radius:50%;" alt="image" />
				</div>
				<div class="col-lg-9">
					<p class="card-title">Name: {{$data->name}}</p>
					<p class="card-title">Email: {{$data->email}}</p>
					<p class="card-title">Gender: {{$data->gender}}</p>
					<p class="card-title">Phone Number: {{$data->phonenumber}}</p>
				</div>
			</div><hr>
		</div>
        <div class="col-lg-7 offset-lg-1">
        	<div class="card" style="padding: 5%;">
        		<h3>Edit Customer's Profile</h3><br>
		        <form action="{{route('profile.update')}}" class="contact-form" method="POST" enctype="multipart/form-data">
		            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="row">
		                <div class="col-lg-6">Name:
		                    <input type="text" name="name" placeholder="Your Name" value="{{$data->name}}">
		                </div>
		                <div class="col-lg-6">Gender:
		                    <input type="text" name="gender" placeholder="Your Gender" value="{{$data->gender}}">
		                </div>
		                <div class="col-lg-6">Phone Number:
		                    <input type="text" name="phonenumber" placeholder="Your Phone Number" value="{{$data->phonenumber}}">
		                </div>
		                <div class="col-lg-6">Profile Picture:
		                    <input type="file" name="photo">
		                </div>
		                <div class="col-lg-12">
		                	<button type="submit">Edit</button>
		                </div>
		            </div>
		        </form>
        	</div><br>
	    </div>   
	</div>
</div>

@endsection