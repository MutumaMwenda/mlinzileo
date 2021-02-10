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

	<h1> Incidence Form </h1>

	<form class="text-center border border-light p-5" action="{{ route('incidence_update', $incidence->id) }}" method="post">

		{{ csrf_field() }}

		<p class="h4 mb-4">Edit Incidence Data</p>

	    <input type="text" id="camera_location" name="camera_location" class="form-control mb-4" placeholder="Enter camera location" value="{{ $incidence->camera_location }}">

	   <!--  <input type="text" id="contact" name="contact" class="form-control mb-4" placeholder="Enter contact" value="{{ $incidence->created_at }}">

	    <input type="text" id="email" name="email" class="form-control mb-4" placeholder="Enter email" value="{{ $incidence->created_at }}"> -->

	    

	    <button class="btn btn-info my-4 btn-block" type="submit">Edit Data</button>


	</form>

</div>

@endsection
