@extends('layouts.sona')
@section('content')
<div class="container">
	<h3>Credit Card Payment</h3><br>

	<div class="row">
		<div class="col-lg-7">
			<form action="#" method="POST" class="contact-form">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
	                <div class="col-lg-6">Card Holder's Name:
	                    <input type="text" name="name" placeholder="Card Holder's Name">
	                </div>
	                <div class="col-lg-6">Card Number:
	                    <input type="text" name="card_number" placeholder="Card Number">
	                </div>
	                <div class="col-lg-12">Card Expiry Date:
	                    <select class="span3" name="expiry_month" id="expiry_month">
							<option value="01">Jan (01)</option>
							<option value="02">Feb (02)</option>
							<option value="03">Mar (03)</option>
							<option value="04">Apr (04)</option>
							<option value="05">May (05)</option>
							<option value="06">June (06)</option>
							<option value="07">July (07)</option>
							<option value="08">Aug (08)</option>
							<option value="09">Sep (09)</option>
							<option value="10">Oct (10)</option>1
							<option value="11">Nov (11)</option>
							<option value="12">Dec (12)</option>
						</select>
						<select class="span2" name="expiry_year">
							<option value="13">2013</option>
							<option value="14">2014</option>
							<option value="15">2015</option>
							<option value="16">2016</option>
							<option value="17">2017</option>
							<option value="18">2018</option>
							<option value="19">2019</option>
							<option value="20">2020</option>
							<option value="21">2021</option>
							<option value="22">2022</option>
							<option value="23">2023</option>
						</select>
	                </div>
	                <div class="col-lg-6">CVV:
	                    <input type="text" name="card_cvv" placeholder="CVV">
	                   <!--  <input type="checkbox" id="save_card" name="save_card" value="option1">
                		Save card on file? -->
                		<button type="submit">Pay Now</button>
	                </div>
	            </div><br>
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
						<p class="card-text" style="font-weight: bold;">Total(MYR)</p>
					</div>
					<div class="col-lg-4">
						<p class="card-text text-right">{{$searchData->range}}</p>
						<p class="card-text text-right">RM {{$roomPrice->price_amount}}</p>
						<p class="card-text text-right">RM {{$roomPrice->service_charge_amount}}</p>
						<p class="card-text text-right">RM {{$roomPrice->service_tax_amount}}</p>
						<p class="card-text text-right" style="font-weight: bold;">RM {{$roomPrice->total_amount}}</p>
					</div>
				</div>
			</div><br>
		</div>
	</div>


@endsection