@extends('layouts.sona')
@section('content')

<div class="container">
	@if(!empty($pendingOrderDataset) || !empty($comfirmOrderDataset) || !empty(rejectOrderDataset))
	<h3 style="font-weight: bold;">My Booking History</h3><br>
	@else
	<h3 style="font-weight: bold;">No Booking History Record</h3><br>
	@endif
	@if(session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{session('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div><br>
	@endif

	@if(!empty($pendingOrderDataset))
		<h4>Pending</h4><br>
		@foreach($pendingOrderDataset as $value)
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<div class="row">
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
							<h4 class="card-title" style="font-weight: bold;"><?php echo $value['roomName']; ?></h4>
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
							<!-- <a href="#" class="btn btn-success">Approve</a>
							<a href="#" class="btn btn-danger">Reject</a> -->
							<h5 class="card-title" style="font-weight: bold;">Status: {{$value['status']}}</h5>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	
		<!-- pagination -->
		{{$customerOrder->links()}}
	@endif

	@if(!empty($comfirmOrderDataset))
		<hr>
		<h4>Approved</h4><br>
		@foreach($comfirmOrderDataset as $value)
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
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
							<h4 class="card-title" style="font-weight: bold;"><?php echo $value['roomName']; ?></h4>
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
							<!-- <a href="#" class="btn btn-success">Approve</a>
							<a href="#" class="btn btn-danger">Reject</a> -->
							<h5 class="card-title" style="font-weight: bold;">Status: {{$value['status']}}</h5>
							<a href="{{route('bookingApplicationForm', $value['booking_Id'])}}" class="btn btn-info">View Booking Details</a>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	
		<!-- pagination -->
		{{$customerOrder->links()}}
	@endif

	@if(!empty($rejectOrderDataset))
		<hr>
		<h4>Rejected</h4><br>
		@foreach($rejectOrderDataset as $value)
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
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
							<h4 class="card-title" style="font-weight: bold;"><?php echo $value['roomName']; ?></h4>
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
							<!-- <a href="#" class="btn btn-success">Approve</a>
							<a href="#" class="btn btn-danger">Reject</a> -->
							<h5 class="card-title" style="font-weight: bold;">Status: {{$value['status']}}</h5>
						</div>
					</div>
				</div>
			</div><br>
		@endforeach	
		<!-- pagination -->
		{{$customerOrder->links()}}
	@endif
	
</div>

@endsection('content')