@extends('layouts.adminsona')
@section('content')
<div class="container">
	<h3>Promotion Code</h3><br>
	@if(session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{session('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<form action="{{route('promotion.store')}}" class="contact-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">Name:
                @if($errors->has('name'))
                <span class="text-danger"><small>{{$errors->first('name')}}</small></span>
                @endif
                <input type="text" name="name" placeholder="Promo Name" class="@if($errors->has('name')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Code:
                @if($errors->has('code'))
                <span class="text-danger"><small>{{$errors->first('code')}}</small></span>
                @endif
                <input type="text" name="code" placeholder="Promo Code" value="<?php echo substr(uniqid(), 7);?>" class="@if($errors->has('code')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Discount:
                @if($errors->has('discount'))
                <span class="text-danger"><small>{{$errors->first('discount')}}</small></span>
                @endif
                <input type="text" name="discount" placeholder="Promo Discount" class="@if($errors->has('discount')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">Availability:
                @if($errors->has('availability'))
                <span class="text-danger"><small>{{$errors->first('availability')}}</small></span>
                @endif
                <input type="text" name="availability" placeholder="Promo Availability" class="@if($errors->has('availability')) is-invalid border-danger @endif">
            </div>
            <div class="col-lg-6">
            	<i class="icon_calendar"></i>
	            <label for="expired">Expired At:</label>
	            <input type="text" class="date-input @if($errors->has('expired')) is-invalid border-danger @endif" id="expired" name="expired" value="<?php echo date('d/m/Y')?>">
	            
	            @if($errors->has('expired'))
	                <span class="text-danger"><small>{{$errors->first('expired')}}</small></span>
	            @endif
	            <button type="submit">Add Promo Code</button>
            </div>
        </div>
    </form><br><br>
	
</div>

@endsection