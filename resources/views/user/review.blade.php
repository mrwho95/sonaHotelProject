@extends('layouts.sona')
@section('content')
<!-- Review Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="rd-reviews">
                <h4>Reviews</h4>
                <div class="review-item">
                    <div class="ri-pic">
                        <img src="{{ asset('img/room/avatar/avatar-1.jpg') }}" alt="">
                    </div>
                    <div class="ri-text">
                        <span>27 Aug 2019</span>
                        <div class="rating">
                            <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star-half_alt"></i>
                        </div>
                        <h5 style="font-weight: bold;">Brandon Kelley</h5>
                        <h5 style="font-weight: bold;">Room type</h5>
                        <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                            adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                        magnam.</p>
                    </div>
                </div>
            </div>
            <div class="review-add">
                <h4>Add Review</h4>
                <form action="#" class="ra-form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-6">Name:
                            <input type="text" placeholder="Your Name*" name="name" value="">
                        </div>
                        <div class="col-lg-6">Email:
                            <input type="text" placeholder="Your Email*" name="email" value="">
                        </div>
                        <div class="col-lg-6">Room Type:
                            <div class="rating">
                                 <select id="roomName" name="roomName" class="form-control">
                                    @foreach($room as $roomData)
                                    <option value="{{$roomData->name}}">{{$roomData->name}}</option>
                                    @endforeach
                                </select>
                            </div><br><br>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <p>Your Rating:</p>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                            </div><br>
                            <p>Your Review:</p>
                            <textarea placeholder="Your Review"></textarea>
                            @if(Auth::check())
                            <button type="submit">Submit Now</button> 
                            @else
                            <a href="{{route('login')}}" class="btn btn-warning">Submit Now</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- Review Section End -->
@endsection