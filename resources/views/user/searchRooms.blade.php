@extends('layouts.sona')
@section('content')

<div class="container">
	<h3 style="font-weight: bold;">Room Search</h3>
	
	<div class="row">
		<div class="col-lg-8">
			@foreach($data as $value)
			<div class="card">
				<div class="row ">
					<div class="col-lg-5">
						<div id="carouselExampleControls_{{$value->id}}" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$value->photo_1)}}" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$value->photo_2)}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$value->photo_3)}}" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls_{{$value->id}}" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls_{{$value->id}}" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- <img src="{{asset('uploads/roomPhoto/'.$value->photo)}}" alt="image"> -->
					</div>
					<div class="col-lg-7 px-3">
						<div class="card-block px-3">
							<h4 class="card-title">{{$value->name}}</h4>
							<p class="card-text">{{$value->price}} MYR</p>
							<p class="card-text">{{$value->size}}</p>
							<p class="card-text">{{$value->service}}</p>
							<a href="{{route('roomDetails', $value->id)}}" class="btn btn-info">Interest</a>
						</div>
					</div>
				</div>
			</div>
			<br>
			@endforeach	
			<!-- pagination -->
			{{$data->links()}} 
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="booking-form">
                    <h3>Booking Your Hotel</h3>
                    <form action="{{route('searchRooms')}}" method="POST">
                    	@method('GET')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input @if($errors->has('dateIn')) is-invalid border-danger @endif" id="date-in" name="dateIn" value="{{$arr['dateIn']}}">
                            <i class="icon_calendar"></i>
                            @if($errors->has('dateIn'))
                                <span class="text-danger"><small>{{$errors->first('dateIn')}}</small></span>
                            @endif
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input @if($errors->has('dateOut')) is-invalid border-danger @endif" id="date-out" name="dateOut" value="{{$arr['dateOut']}}">
                            <i class="icon_calendar"></i>
                            @if($errors->has('dateOut'))
                                <span class="text-danger"><small>{{$errors->first('dateOut')}}</small></span>
                            @endif
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest" name="guest" class="@if($errors->has('guest')) is-invalid border-danger @endif">
                            	<option value="{{$arr['guest']}}">{{$arr['guest']}}</option>
                                <option value="1 Adult">1 Adult</option>
                                <option value="2 Adults">2 Adults</option>
                                <option value="3 Adults">3 Adults</option>
                                <option value="4 Adults">4 Adults</option>
                                <option value="5 Adults">5 Adults</option>
                            </select>
                            @if($errors->has('guest'))
                                <span class="text-danger"><small>{{$errors->first('guest')}}</small></span>
                            @endif
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
		</div>
	</div>	
</div>
<br>


</div>

@endsection