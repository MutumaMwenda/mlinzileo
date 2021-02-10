@extends('layouts.main')
@section('content')

<div class="container">

@if($errors->any())
@foreach($errors->all() as $error)

<div class="alert alert-danger" role="alert">
	{{ $error }}
</div>
@endforeach
@endif

	<h1> Station Form </h1>

	<form class="text-center border border-light p-5" action="{{ route('station_update', $station->id) }}" method="post">

		{{ csrf_field() }}

		<p class="h4 mb-4">Edit Station Data</p>

	    <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Enter name" value="{{ $station->name }}">

	    <input type="text" id="contact" name="contact" class="form-control mb-4" placeholder="Enter contact" value="{{ $station->contact }}">

	    <input type="text" id="email" name="email" class="form-control mb-4" placeholder="Enter email" value="{{ $station->email }}">

	    

	    <button class="btn btn-info my-4 btn-block" type="submit">Edit Data</button>


	</form>

</div>

@endsection
