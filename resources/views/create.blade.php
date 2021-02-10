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

	<h1> Student Form  </h1>

	<form class="text-center border border-light p-5" action="{{ route('store') }}" method="post">

		{{ csrf_field() }}

		<p class="h4 mb-4">Add Student </p>

	    <input type="text" id="nim" name="nim" class="form-control mb-4" placeholder="Enter Reg No">

	    <input type="text" id="nama" name="nama" class="form-control mb-4" placeholder="Enter Name">

	    <input type="text" id="jurusan" name="jurusan" class="form-control mb-4" placeholder="Enter Course">

	    <input type="text" id="jurusan" name="notelp" class="form-control mb-4" placeholder="Enter Telephone">

	    <button class="btn btn-info my-4 btn-block" type="submit">Add Student</button>


	</form>

</div>

@endsection
