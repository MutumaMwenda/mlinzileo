@extends('layouts.main')
@section('content')

<div class="container">

   <br>
    

    <div class="add-btn mb-15">
       <a href="{{ url('/incidence_create')}}" class="btn btn-primary">ADD NEW INCIDENT</a>
      </div>
      <h1> <center> Incidences </center></h1>

    @if(session('successMsg'))

    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>

    @endif

    <table class="table table-striped">
        <thead class="blue white-text">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Camera location</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                 <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = $incidences->firstItem() - 1;?>
            @foreach($incidences as $mhs)
            <?php $no++; ?>
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $mhs->camera_location }}</td>
                <td>{{ $mhs->created_at->toDateString() }}</td>
                <td>{{ $mhs->created_at->toTimeString() }}</td>
                <td>
                    <a href="{{ route('incidence_edit', $mhs->id) }}" class="btn btn-raised btn-primary btn-sm"><i class="far fa-edit"></i></a>
                    || 

                    <form method="post" id="delete-form-{{ $mhs->id }}" action="{{ route('incidence_delete',$mhs->id) }}" style="display: none;">

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

    {{ $incidences->links() }}
</div>
@endsection
