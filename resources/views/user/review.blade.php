@extends('layouts.sona')
@section('content')
<!-- Review Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="rd-reviews">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br>
                @endif
                <h4>Reviews</h4>
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
                @foreach($reviewData as $data)
                <div class="review-item">
                    <div class="ri-pic">
                        <img src="{{ asset('img/room/avatar/avatar-1.jpg') }}" alt="image">
                    </div>
                    <div class="ri-text">
                        <span>{{$data->created_at}}</span>
                        <!-- jQuery code at app sona blade -->
<!--                         <p>Rating: <span class="result">0</span></p>
 -->                        <!-- <div class="rating"> -->
                            <div class="rateyo" data-rateyo-rating="{{$data->rating}}" data-rateyo-num-stars="5" style="float: right;">
                            </div>
                            <input type="hidden" name="rating">

                            <!-- <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star"></i>
                            <i class="icon_star-half_alt"></i> -->
                            
                        <!-- </div> -->
                        <h5 style="font-weight: bold;">{{$data->room_name}}</h5>
                        <h6>{{$data->name}}</h6>
                        <p>{{$data->message}}</p>
                    </div>
                </div>
                @endforeach
                {{$reviewData->links()}} 
            </div>
            <div class="review-add">
                <h4>Add Review</h4>
                <form action="{{route('reviewProcess')}}" class="ra-form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        @if(Auth::check())
                        <div class="col-lg-6">Name:
                            <input type="text" name="user_name" value="{{$userData->name}}">
                        </div>
                        <div class="col-lg-6">Email:
                            <input type="text" name="user_email" value="{{$userData->email}}">
                        </div>
                        @else
                        <div class="col-lg-6">Name:
                            <input type="text" placeholder="Your Name" name="user_name" value="">
                        </div>
                        <div class="col-lg-6">Email:
                            <input type="text" placeholder="Your Email*" name="user_email" value="">
                        </div>
                        @endif
                        <div class="col-lg-6">Room Type:
                            <select id="roomName" name="room_name" class="form-control">
                            @foreach($room as $roomData)
                            <option value="{{$roomData->name}}">{{$roomData->name}}</option>
                            @endforeach
                            </select>
                        </div><br><br>
                        <div class="col-lg-12">
                            <!-- <div class="col-lg-6"> -->
                                <!-- jQuery code at app sona blade -->
                                Rating: <span class="result">0</span>
                                <!-- <div class="rating"> -->
                                    <div class="rateyo" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5" data-rateyo-score="3">
                                    </div>
                                    <input type="hidden" name="rating"><br>

                                    <!-- <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i> -->
                                    
                                <!-- </div> -->
                            <!-- </div><br> -->
                            Your Review:
                            <textarea placeholder="Your Review" name="reviewMessage"></textarea>
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