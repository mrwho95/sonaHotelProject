@extends('layouts.sona')
@section('content')
<!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach($room as $roomData)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div id="carouselExampleControls_{{$roomData->id}}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$roomData->photo_1)}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$roomData->photo_2)}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('uploads/roomPhoto/'.$roomData->photo_3)}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls_{{$roomData->id}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls_{{$roomData->id}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
<!--                         <img src="{{ asset('uploads/roomPhoto/'.$roomData->photo_1) }}" alt="image">
 -->                        <div class="ri-text">
                            <h4>{{$roomData->name}}</h4>
                            <h3>{{$roomData->price}} MYR<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{$roomData->size}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$roomData->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{$roomData->bed}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>{{$roomData->service}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{route('roomDetails', $roomData->id)}}" class="primary-btn">Booking Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- {{$data->links()}} -->
                <div class="col-lg-12">
                    <div class="room-pagination">

                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection