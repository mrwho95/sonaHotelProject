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
				
					<p class="card-text">Check-In: {{$searchData->dateIn}}</p>
					<p class="card-text">Check-Out: {{$searchData->dateOut}}</p>
					<p class="card-text">Guest: {{$searchData->guest}}</p>
				</div>
				<div class="col-lg-4">
					Edit
				</div>
			</div><hr>
			<h4 class="card-title" style="font-weight: bold;">Promo code</h4><br>
			<p class="card-text">Do you have any promo code?</p>
			<div class="row">
				<form action="#" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-lg-8">
						<input type="text" name="promo_code" placeholder="Your coupon" class="form-control">
					</div>
					<div class="col-lg-4">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div><hr>
			<h4 class="card-title" style="font-weight: bold;">Payment Method</h4><br>
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<img src="{{asset('img/payment/card.jpg')}}" alt="Credit card">
						<p class="card-text text-center">Credit Card</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<img src="{{asset('img/payment/online.jpg')}}" alt="Online banking">
						<p class="card-text text-center">Online Banking</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<img src="{{asset('img/payment/cash.jpg')}}" alt="Cash">
						<p class="card-text text-center">Cash</p>
					</div>
				</div>
			</div><hr>
			<div class="card" style="padding: 10%;">
				<h4 class="card-title" style="font-weight: bold;">Message to Sona Hotel</h4><br>
				<p class="card-text" style="font-weight: bold;">Let us know what you need</p>
				<p class="card-text">Requests are fulfilled on a first come, first served basis. We'll send yours right after you book.</p>
				<form action="#" method="POST">
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
				</form>
				<p class="card-text" style="font-weight: bold;">Let us know when you will reach and check in </p>
				<p class="card-text">Check In Date: {{$searchData->dateIn}}</p>
				<p class="card-text">Check In Time: </p>
				<form action="#" method="POST" class="contact-form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<select size="10" id="checkIn" name="checkIn" class="form-control">
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
					</select><br><br><br>
					<p class="card-text">Any more personal requests: </p>
					<textarea type="text" placeholder="Your request" name="message"></textarea>
					<button type="submit">Send Message</button>
				</form>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="card" style="padding: 10%;">
				<h4 class="card-title" style="font-weight: bold;">Price details</h4>
				<div class="row">
					<div class="col-lg-6">
						<p class="card-text">Day</p>
						<p class="card-text">Room fee</p>
						<p class="card-text">Service fee</p>
						<p class="card-text" style="font-weight: bold;">Total(MYR)</p>
					</div>
					<div class="col-lg-6">
						<p class="card-text text-right">1 night</p>
						<p class="card-text text-right">RM200</p>
						<p class="card-text text-right">RM50</p>
						<p class="card-text text-right" style="font-weight: bold;">RM250</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

</div>


@endsection