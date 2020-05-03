@extends('layouts.sona')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{{route('profile')}}">User Profile</a>
				</li>
				<li class="breadcrumb-item active">Overview</li>
			</ol>

			<div class="card mx-5 mt-5">
				<div class="card-header">
					<i class="fa fa-user">User Account Details</i>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">Name:  
								{{$data->name}}
							</div>
							<div class="col-md-6">Gender:
								{{$data->gender}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								Email: {{$data->email}}
							</div>
							<div class="col-md-6">
								Phone Number: {{$data->phonenumber}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- update profile-->
		<div id="update" class="card card-register mx-auto mt-5">
			<div class="card-header">Update User Profile</div>
			<div class="card-body">
				<form action="{{route('profile.update', $data->id)}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<label for="name">Name</label>
									<input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{$data->name}}">
									<span class="text-danger"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<label for="inputEmail">Email address</label>
									<input type="email" id="email" class="form-control" placeholder="Email address" name="email" value="{{$data->email}}">

									<span class="text-danger"></span>
								</div>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<label for="phonenumber">Phone Number</label>
									<input type="tel" id="phonenumber" class="form-control" placeholder="Phone Number" name="phonenumber" value="{{$data->phonenumber}}" >

									<span class="text-danger"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="select-option">
	                                <label for="gender">Gender:</label>
	                                <select id="gender">
	                                    <option selected disabled>Select Gender</option>
										<option>Male</option>
										<option>Female</option>
	                                </select>
	                            </div>
							</div>
						</div>
					</div>
					<input class="btn btn-primary btn-block" type="submit" name="update" value="Update">
				</form>
			</div>
		</div>

		<div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
	        <div class="booking-form">
	            <h3>Booking Your Hotel</h3>
	            <form action="#">
	                <div class="check-date">
	                    <label for="date-in">Check In:</label>
	                    <input type="text" class="date-input" id="date-in">
	                    <i class="icon_calendar"></i>
	                </div>
	                <div class="check-date">
	                    <label for="date-out">Check Out:</label>
	                    <input type="text" class="date-input" id="date-out">
	                    <i class="icon_calendar"></i>
	                </div>
	                <div class="select-option">
	                    <label for="guest">Guests:</label>
	                    <select id="guest">
	                        <option value="">1 Adult</option>
	                        <option value="">2 Adults</option>
	                        <option value="">3 Adults</option>
	                    </select>
	                </div>
	                <!-- <div class="select-option">
	                    <label for="room">Room:</label>
	                    <select id="room">
	                        <option value="">1 Room</option>
	                        <option value="">2 Room</option>
	                    </select>
	                </div> -->
	                <button type="submit">Check Availability</button>
	            </form>
	        </div>
	    </div>
        <div class="col-lg-7 offset-lg-1">
	        <form action="{{route('contactcustomer.store')}}" class="contact-form" method="post">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="row">
	                <div class="col-lg-6">Name:
	                    <input type="text" name="name" placeholder="Your Name">
	                </div>
	                <div class="col-lg-6">Email:
	                    <input type="text" name="email" placeholder="Your Email">
	                </div>
	                <div class="col-lg-12">Message:
	                    <textarea type="text" placeholder="Your Message" name="message"></textarea>
	                    <button type="submit">Submit Now</button>
	                </div>
	            </div>
	        </form>
	    </div>   
	</div>
</div>

@endsection