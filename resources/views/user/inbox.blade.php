@extends('layouts.sona')
@section('content')
<div class="container">
	<h3>Inbox</h3>
	@foreach($orderData as $value)
	<br>
	<div class="card">
		<div class="row" style="padding:5%;">
			<div class="col-lg-4">
				@foreach($roomData as $key => $data)
					@if($value->room_id == $data->id)
                		<img src="{{ asset('uploads/roomPhoto/'.$data->photo_1) }}" alt="room image" class="rounded-circle" style="height: 200px;width: 200px;">
                	@endif
                @endforeach  
			</div>
			<div class="col-lg-4">
				<p>{{$value->booking_code}}</p>
				@foreach($roomData as $key => $data)
					@if($value->room_id == $data->id)
                		<strong>{{$data->name}}</strong>
                	@endif
                @endforeach 
				<p>{{$value->check_in}}</p>
				<p>{{$value->check_out}}</p>
				<p>{{$value->range}}</p>
			</div>
			<div class="col-lg-4 " style="display: flex; justify-content: center; margin-top:50px;">
				<strong style="font-size: 30pt; text-align: center;">{{$value->status}}</strong>
			</div>
		</div>
	</div>
	@endforeach
	<br>
</div>
@endsection