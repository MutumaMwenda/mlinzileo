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

	<h1> Incidence Form  </h1>

	<form class="text-center border border-light p-5" action="{{ route('incidence_store') }}" method="post">

		{{ csrf_field() }}

		<p class="h4 mb-4">Add Incidence </p>

	    <input type="text" id="camera_location" name="camera_location" class="form-control mb-4" placeholder="Enter camera location">

	   


	    <button class="btn btn-info my-4 btn-block" type="submit">Report Incidence</button>


	</form>

</div>

@endsection
