@extends('layouts.sona')
@section('content')
<!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our {{$room->name}}</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>{{$room->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <!-- image -->
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$room->photo_1)}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$room->photo_2)}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$room->photo_3)}}" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                       <!-- done image -->
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{$room->name}}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="{{route('roomReserve', $room->id)}}">Reserve</a>
                                </div>
                            </div>
                            <h2>{{$room->price}} MYR<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{$room->size}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$room->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{$room->bed}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>{{$room->service}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">Motorhome or Trailer that is the question for you. Here are some of the
                                advantages and disadvantages of both, so you will be confident when purchasing an RV.
                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth
                                wheeler? The advantages and disadvantages of both are studied so that you can make your
                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an
                                achievement of a lifetime. It can be similar to sojourning with your residence as you
                                search the various sites of our great land, America.</p>
                            <p>The two commonly known recreational vehicle classes are the motorized and towable.
                                Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth
                                wheel has the attraction of getting towed by a pickup or a car, thus giving the
                                adaptability of possessing transportation for you when you are parked at your campsite.
                            </p>
                        </div>
                    </div>
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
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ asset('img/room/avatar/avatar-2.jpg') }}" alt="">
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
                                <h5>Brandon Kelley</h5>
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
                                <div class="col-lg-12">
                                    <div>
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="booking-form">
                            <h3>Booking Your Hotel</h3>
                            <form action="{{route('searchRooms')}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <input type="text" class="date-input @if($errors->has('dateIn')) is-invalid border-danger @endif" id="date-in" name="dateIn" value="{{$searchData->dateIn}}">
                                    <i class="icon_calendar"></i>
                                    @if($errors->has('dateIn'))
                                        <span class="text-danger"><small>{{$errors->first('dateIn')}}</small></span>
                                    @endif
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                    <input type="text" class="date-input @if($errors->has('dateOut')) is-invalid border-danger @endif" id="date-out" name="dateOut" value="{{$searchData->dateOut}}">
                                    <i class="icon_calendar"></i>
                                    @if($errors->has('dateOut'))
                                        <span class="text-danger"><small>{{$errors->first('dateOut')}}</small></span>
                                    @endif
                                </div>
                                <div class="select-option">
                                    <label for="guest">Guests:</label>
                                    <select id="guest" name="guest" class="@if($errors->has('guest')) is-invalid border-danger @endif">  
                                        <option value="{{$searchData->guest}}">{{$searchData->guest}}</option>
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
    </section>
    <!-- Room Details Section End -->
@endsection