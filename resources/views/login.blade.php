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

    <h1> Login  </h1>

    <form class="text-center border border-light p-5" action="{{ route('login') }}" method="post">

        {{ csrf_field() }}

        

         <input id="email" type="email" class="form-control mb-4" name="email"
                                                   value="{{ old('email') }}" required autofocus>

        <input id="password" type="password" class="form-control" name="password"
                                                   required>

                                                    
                                                    <input type="checkbox"
                                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    Remember Me
                                               

        


        <button class="btn btn-info my-4 btn-block" type="submit">Login</button>


    </form>

</div>

@endsection 
