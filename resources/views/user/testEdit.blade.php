@extends('layouts.sona')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-lg-6">
				<h3 class="m-0 text-dark">Edit Message</h3>
			</div>
			<div class="col-lg-6">
				<ol class="breadcrumb float-lg-right">
					<li class="breadcrumb-item"><a href="{{route('contact')}}">Contact</a></li>
					<li class="breadcrumb-item"><a href="{{route('contactcustomer.index')}}">Contact Customer</a></li>
					<li class="breadcrumb-item active">>Edit Message</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		 <form method="post" action="{{route('contactcustomer.update', $data->id)}}" class="contact-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">Name
                    <input type="text" name="editName" placeholder="Your Name" value="{{$data->name}}">
                </div>
                <div class="col-lg-6">Email
                    <input type="text" name="editEmail" placeholder="Your Email" value="{{$data->email}}">
                </div>
                <div class="col-lg-12">Message
                    <textarea type="text" placeholder="Your Message" name="editMessage">{{$data->message}}</textarea>
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
	</div>
</section>
@endsection