@extends('layouts.adminsona')
@section('content')
<div class="container">
	<h3>Dashboard</h3><br>
	<div class="row">
		<div class="col-lg-12" style="height: 300px;">
			<h4>Customer's Booking</h4>
			{!! $barchart_1->container() !!}
			{!! $barchart_1->script() !!}
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-lg-12" style="height: 300px;">
			<h4>Customer's Favourite</h4>
			{!! $barchart_2->container() !!}
			{!! $barchart_2->script() !!}
		</div>
	</div><br><br>
	

</div>
@endsection