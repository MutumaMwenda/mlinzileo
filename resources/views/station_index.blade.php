@extends('layouts.main')
@section('content')

<div class="container">

   <br>
    

    <div class="add-btn mb-15">
       <a href="{{ url('/station_create')}}" class="btn btn-primary">ADD NEW STATION</a>
      </div>
      <h1> <center> Stations Data </center></h1>

    @if(session('successMsg'))

    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>

    @endif

    <table class="table table-striped">
        <thead class="blue white-text">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = $stations->firstItem() - 1;?>
            @foreach($stations as $mhs)
            <?php $no++; ?>
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $mhs->name }}</td>
                <td>{{ $mhs->contact }}</td>
                <td>{{ $mhs->email }}</td>
                <td>
                    <a href="{{ route('station_edit', $mhs->id) }}" class="btn btn-raised btn-primary btn-sm"><i class="far fa-edit"></i></a>
                    || 

                    <form method="post" id="delete-form-{{ $mhs->id }}" action="{{ route('station_delete',$mhs->id) }}" style="display: none;">

                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    </form>

                    <button onclick="if(confirm('You are sure you want to delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $mhs->id }}').submit();
                    }else{
                        event.preventDefault()
                    }

                    " class="btn btn-raised btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $stations->links() }}
</div>
@endsection
