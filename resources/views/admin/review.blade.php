@extends('layouts.adminsona')
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
                @foreach($reviewData as $data)
                <div class="row">
                    <div class="review-item">
                        <div class="ri-pic">
                            @foreach($user as $key => $value)
                                @if($data->user_id == $value['id'])
                                    <img src="{{ asset('uploads/userPhoto/'.$value['userphoto']) }}" alt="image">
                                @endif
                            @endforeach
                        </div>
                        <div class="ri-text">
                            <span>{{$data->created_at}}</span>
                                <a href="{{route('deleteReview', $data->id)}}" class="btn btn-danger" style="float: right;">Delete</a>
                            <!-- jQuery code at app sona blade -->
    <!--                         <p>Rating: <span class="result">0</span></p>
     -->                        <!-- <div class="rating"> -->
                                <div class="rateyo" data-rateyo-rating="{{$data->rating}}" data-rateyo-num-stars="5" style="float: right;">
                                </div>
<!--                                 <input type="hidden" name="rating">
 -->
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
                </div>
                
                @endforeach
                {{$reviewData->links()}} 
            </div>
        </div>
    </div>
</section>

    <!-- Review Section End -->
@endsection