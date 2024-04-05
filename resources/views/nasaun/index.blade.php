@extends('welcome')

@section('content')
<div class="container">
 
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <a href="{{ route('nasaun.create') }}" class="btn btn-success btn-xs my-2"><i class="fa fa-plus"></i> Aumenta Dadus</a>
            <thead>
            <tr>
              <th>No</th>
              <th>Nasaun</th>
              <th>Aksaun</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($data as $datas)
            <tr>
              <td>{{ $loop->iteration; }}</td>
              <td>{{ $datas->nrn_nasaun }}</td>
              <td>
                <a href="{{ route('nasaun.edit', $datas->id) }}" class="btn btn-primary btn-xs">Hadia</a>
                {{-- <form action="{{ route('nasaun.destroy', $datas->id_nasaun) }}" method="POST" class="d-inline border-none bg-danger">
                  @csrf
                  @method('DELETE')
                  <button class="border-none"><i class="fa fa-trash text-danger"></i></button>
                </form> --}}

                <form action="{{ route('nasaun.destroy', $datas->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-xs">Hamos</button>
              </form>

              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

</div>
@endsection