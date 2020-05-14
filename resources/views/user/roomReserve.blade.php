@extends('layouts.sona')
@section('content')

<div class="container">
	<h3 style="font-weight: bold;">Confirm and Pay</h3><br>
	<div class="row">
		<div class="col-lg-7">
			<div class="row">
				<div class="col-lg-5">
					<img src="{{asset('uploads/roomPhoto/'.$room->photo_1)}}" class="rounded" alt="image">
				</div>
				<div class="col-lg-7">
					<h4 class="card-title" style="font-weight: bold;">{{$room->name}}</h4>
					<p class="card-text">{{$room->bed}}</p>
					<p class="card-text">{{$room->capacity}}</p>
					<p class="card-text">{{$room->service}}</p>
				</div>
			</div><hr>
			<h4 class="card-title" style="font-weight: bold;">{{Auth::user()->name}} Trip</h4><br>
			<div class="row">
				<div class="col-lg-8">
					<p class="card-text">Check-In: {{$searchData['dateIn']}}</p>
					<p class="card-text">Check-Out: {{$searchData['dateOut']}}</p>
					<p class="card-text">Duration: {{$searchData['range']}}</p>
					<p class="card-text">Guest: {{$searchData['guest']}}</p>
				</div>
				<div class="col-lg-4">
					<a href="{{route('roomDetails', $room->id)}}" class="btn btn-warning">Edit Trip</a>
				</div>
			</div><hr>
			<h4 class="card-title" style="font-weight: bold;">Promo code</h4><br>
			<p class="card-text">Do you have any promo code?</p>
			@if(session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{session('success')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
			@if(session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{session('error')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
			<div class="row">
				<form action="{{route('promo.store', $room->id)}}" method="POST">
				@method('GET')
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-lg-8">
						@if(session('success'))
						<input type="text" name="promo_code" placeholder="Your coupon" class="form-control" value="<?php echo $promoCode;?>">
						@else
						<input type="text" name="promo_code" placeholder="Your coupon" class="form-control">
						@endif
						
					</div><br>
					<div class="col-lg-4">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div><hr>
			
			<form method="POST" action="{{route('bookingProcess', $room->id)}}">
				@method('GET')
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="card" style="padding: 10%;">
					<h4 class="card-title" style="font-weight: bold;">Message to Sona Hotel</h4><br>
					<p class="card-text" style="font-weight: bold;">Let us know what you need</p>
					<p class="card-text">Requests are fulfilled on a first come, first served basis. We'll send yours right after you book.</p>
					<div class="jumbotron">
						<h5 class="card-title" style="font-weight: bold;">Customer Preference</h5>
						<p class="card-text">Do you have a smoking preference?</p>
						<div class="row">
							<div class="col-lg-6">
								<input type="radio" id="smoke" name="smokeornot" value="Smoking">
								<label for="smoke">Smoking</label><br>
							</div>
							<div class="col-lg-6">
								<input type="radio" id="non-smoke" name="smokeornot" value="Non-smoking">
								<label for="non-smoke">Non-smoking</label><br>
							</div>
						</div><br>
						<p class="card-text">What bed configuration do you prefer?</p>
						<div class="row">
							<div class="col-lg-6">
								<input type="radio" id="largeBed" name="largeortwin" value="Large bed">
								<label for="largeBed">Large bed</label><br>
							</div>
							<div class="col-lg-6">
								<input type="radio" id="twinBed" name="largeortwin" value="Twin bed">
								<label for="twinBed">twin bed</label><br>
							</div>
						</div>
					</div>
					<p class="card-text" style="font-weight: bold;">Let us know when you will reach and check in </p>
					<p class="card-text">Check In Date: {{$searchData['dateIn']}}</p>
					<p class="card-text">Check In Time: </p>
					<select size="10" id="checkIn" name="checkInTime" class="form-control">
						<option value="I don't know">I don't know</option>
						<option value="00:00-01:00">00:00-01:00</option>
						<option value="01:00-02:00">01:00-02:00</option>
						<option value="02:00-03:00">02:00-03:00</option>
						<option value="03:00-04:00">03:00-04:00</option>
						<option value="04:00-05:00">04:00-05:00</option>
						<option value="05:00-06:00">05:00-06:00</option>
						<option value="06:00-07:00">06:00-07:00</option>
						<option value="07:00-08:00">07:00-08:00</option>
						<option value="08:00-09:00">08:00-09:00</option>
						<option value="09:00-10:00">09:00-10:00</option>
						<option value="10:00-11:00">10:00-11:00</option>
						<option value="11:00-12:00">11:00-12:00</option>
						<option value="12:00-13:00">12:00-13:00</option>
						<option value="13:00-14:00">13:00-14:00</option>
						<option value="14:00-15:00">14:00-15:00</option>
						<option value="15:00-16:00">15:00-16:00</option>
						<option value="16:00-17:00">16:00-17:00</option>
						<option value="17:00-18:00">17:00-18:00</option>
						<option value="18:00-19:00">18:00-19:00</option>
						<option value="19:00-20:00">19:00-20:00</option>
						<option value="20:00-21:00">20:00-21:00</option>
						<option value="21:00-22:00">21:00-22:00</option>
						<option value="22:00-23:00">22:00-23:00</option>
						<option value="23:00-00:00">23:00-00:00</option>
						<option value="00:00-01:00 (The next day)">00:00-01:00 (The next day)</option>
						<option value="01:00-02:00 (The next day)">01:00-02:00 (The next day)</option>
					</select><br>
					<p class="card-text">Any more personal requests: </p>
					<textarea type="text" placeholder="Your request" name="message" style="width: 100%; height: 150px;"></textarea>
				</div><br>
				<button type="submit" style="font-size: 13px; font-weight: 700; text-transform: uppercase;
				color: #ffffff;
				letter-spacing: 2px;
				background: #dfa974;
				border: none;
				padding: 14px 34px 13px;
				display: inline-block;">Booking Now</button>
			</form>
			
		</div>
		<div class="col-lg-5">
			<div class="card" style="padding: 10%;">
				<h4 class="card-title" style="font-weight: bold;">Price details</h4>
				<div class="row">
					<div class="col-lg-8">
						<p class="card-text">Trip duration</p>
						<p class="card-text">Room fee</p>
						<p class="card-text">Service charge fee (10%)</p>
						<p class="card-text">Service tax fee (6%)</p>
						@if(session('success'))
						<p class="card-text">Promo code (<?php echo $promoCode;?>)</p>
						@endif
						<p class="card-text" style="font-weight: bold;">Total(MYR)</p>
					</div>
					<div class="col-lg-4">
						<p class="card-text text-right">{{$searchData['range']}}</p>
						<p class="card-text text-right">RM <?php echo $roomPrice; ?></p>
						<p class="card-text text-right">RM <?php echo $serviceChargeAmount;?></p>
						<p class="card-text text-right">RM <?php echo $serviceTaxAmount;?></p>
						@if(session('success'))
						<p class="card-text text-right">- RM <?php echo $discountAmount;?></p>
						<p class="card-text text-right" style="font-weight: bold;">RM <?php echo $afterDiscount;?></p>
						@else
						<p class="card-text text-right" style="font-weight: bold;">RM <?php echo $totalAmount;?></p>
						@endif
					</div>
				</div>
			</div><br>
			<h4 class="card-title" style="font-weight: bold;">Payment Method</h4><br>
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<a href="{{route('creditCard', $room->id)}}"><img src="{{asset('img/payment/card.jpg')}}" alt="Credit card"></a>
						<p class="card-text text-center">Credit Card</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<a href="{{route('creditCard', $room->id)}}"><img src="{{asset('img/payment/online.jpg')}}" alt="Online banking"></a>
						<p class="card-text text-center">Online Banking</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<a href="{{route('creditCard', $room->id)}}"><img src="{{asset('img/payment/cash.jpg')}}" alt="Cash"></a>
						<p class="card-text text-center">Cash</p>
					</div>
				</div>
			</div><hr>
		</div>
	</div>
	<br>

</div>


@endsection