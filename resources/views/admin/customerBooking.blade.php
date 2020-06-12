@extends('layouts.adminsona')
@section('content')
<div class="container">
	@if(!empty($pendingOrderDataset) || !empty($comfirmOrderDataset) || !empty($rejectOrderDataset))
	<h3 style="font-weight: bold;">Customer's Booking Order</h3><br>
	@else
	<h3 style="font-weight: bold;">No Customer's Booking Order</h3><br>
	@endif
	@if(session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{session('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div><br>
	@endif
	@if(session('warning'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{session('warning')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div><br>
	@endif
	@if(!empty($pendingOrderDataset))
		<h4>Pending</h4><br>
		
		@foreach($pendingOrderDataset as $value)
			<div class="card">
				<div class="row ">
					<div class="col-lg-5">
						<div id="carouselExampleControls_{{$value['roomId']}}" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_1'])}}" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_2'])}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_3'])}}" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- <img src="{{asset('uploads/roomPhoto').'/'.$value['roomPhoto_1']}}" alt="image"> -->
					</div>
					<div class="col-lg-7 px-3" style="padding: 5%;">
						<div class="card-block px-3">
							<h4 class="card-title"><?php echo $value['roomName']; ?></h4>
							<p class="card-text"><?php echo $value['hotelAddress']; ?></p>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Booking ID: <?php echo $value['bookingCode']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Duration Trip: <?php echo $value['range']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Check In: <?php echo $value['checkIn']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Check Out: <?php echo $value['checkOut']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Guest: <?php echo $value['userName']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Paid: RM<?php echo $value['totalAmount']; ?></p>
								</div>
							</div>
							<a href="{{route('bookingApprove', $value['Id'])}}" class="btn btn-success">Approve</a>
							<a href="{{route('bookingReject', $value['Id'])}}" class="btn btn-danger">Reject</a>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	

	@endif
	
	
	@if(!empty($comfirmOrderDataset))
		<hr>
		<h4>Approve</h4><br>
		@foreach($comfirmOrderDataset as $value)

			<div class="card">
				<div class="row ">
					<div class="col-lg-5">
						<div id="carouselExampleControls_{{$value['roomId']}}" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_1'])}}" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_2'])}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_3'])}}" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- <img src="{{asset('uploads/roomPhoto').'/'.$value['roomPhoto_1']}}" alt="image"> -->
					</div>
					<div class="col-lg-7 px-3" style="padding: 5%;">
						<div class="card-block px-3">
							<h4 class="card-title"><?php echo $value['roomName']; ?></h4>
							<p class="card-text"><?php echo $value['hotelAddress']; ?></p>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Booking ID: <?php echo $value['bookingCode']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Duration Trip: <?php echo $value['range']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Check In: <?php echo $value['checkIn']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Check Out: <?php echo $value['checkOut']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Guest: <?php echo $value['userName']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Paid: RM<?php echo $value['totalAmount']; ?></p>
								</div>
							</div>
							<h5 class="card-title" style="font-weight: bold;">Status: {{$value['status']}}</h5>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	

	@endif
	

	
	@if(!empty($rejectOrderDataset))
		<hr>
		<h4>Reject</h4><br>
		@foreach($rejectOrderDataset as $value)
			<div class="card">
				<div class="row ">
					<div class="col-lg-5">
						<div id="carouselExampleControls_{{$value['roomId']}}" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_1'])}}" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_2'])}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto'.'/'.$value['roomPhoto_3'])}}" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls_{{$value['roomId']}}" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- <img src="{{asset('uploads/roomPhoto').'/'.$value['roomPhoto_1']}}" alt="image"> -->
					</div>
					<div class="col-lg-7 px-3" style="padding: 5%;">
						<div class="card-block px-3">
							<h4 class="card-title"><?php echo $value['roomName']; ?></h4>
							<p class="card-text"><?php echo $value['hotelAddress']; ?></p>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Booking ID: <?php echo $value['bookingCode']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Duration Trip: <?php echo $value['range']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Check In: <?php echo $value['checkIn']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Check Out: <?php echo $value['checkOut']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="card-text">Guest: <?php echo $value['userName']; ?></p>
								</div>
								<div class="col-lg-6">
									<p class="card-text">Paid: RM<?php echo $value['totalAmount']; ?></p>
								</div>
							</div>
							<h5 class="card-title" style="font-weight: bold;">Status: {{$value['status']}}</h5>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	
	@endif

</div>

@endsection