@extends('layouts.adminsona')
@section('content')
<div class="container">
	<h3>Dashboard</h3><br>
	<div class="row">
		<div class="col-lg-12" style="height: 300px;">
			<h4>Customer's Favourite</h4>
			{!! $chart->container() !!}
			{!! $chart->script() !!}
		</div>
		<!-- <div class="col-lg-6">
			<h4>Customer's Favourite</h4>
			{!! $chart->container() !!}
			{!! $chart->script() !!}
		</div> -->
	</div><br><br>
	

</div>
@endsection