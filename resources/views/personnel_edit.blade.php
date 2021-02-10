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

	<h1> Personnel Form </h1>

	<form class="text-center border border-light p-5" action="{{ route('personnel_update', $personnel->id) }}" method="post">

		{{ csrf_field() }}

		<p class="h4 mb-4">Edit Personnel Data</p>

	    <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Enter name" value="{{ $personnel->name }}">

	    <input type="text" id="contact" name="contact" class="form-control mb-4" placeholder="Enter contact" value="{{ $personnel->contact }}">

	    <input type="text" id="email" name="email" class="form-control mb-4" placeholder="Enter email" value="{{ $personnel->email }}">

	    

	    <button class="btn btn-info my-4 btn-block" type="submit">Edit Data</button>


	</form>

</div>

@endsection
