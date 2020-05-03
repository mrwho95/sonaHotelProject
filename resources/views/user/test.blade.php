@extends('layouts.sona')
@section('content')
<?php
// echo "Hello world";
// print_r($message);
?>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Contact Customer</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('contact')}}">Contact</a></li>
					<li class="breadcrumb-item active">Contact Customer</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<p>
			<a href="#" class="btn btn-primary">Add</a>
		</p>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Message</th>
				<th>Action</th>
			</tr>
			@foreach($message as $data)
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->email}}</td>
					<td>{{$data->message}}</td>
					<td><a href="{{route('contactcustomer.edit', $data->id)}}" class="btn btn-warning">Edit</a>
						<a href="javascript::void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
						<form action="{{route('contactcustomer.destroy', $data->id)}}" method='post'>
							@method('DELETE')
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</section>

@endsection