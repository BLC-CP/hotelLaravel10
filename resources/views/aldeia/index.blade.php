@extends('welcome')

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <a href="{{ route('aldeia.create') }}" class="btn btn-success btn-xs my-2"><i class="fa fa-plus"></i> Aumenta Dadus</a>
            <thead>
            <tr>
              <th>Aldeia</th>
              <th>Suku</th>
              <th>Postu</th>
              <th>Munisipiu</th>
              <th>Aksaun</th>
            </tr>
            </thead>
            <tbody>
              @if ($data->count() > 0)
              @foreach ($data as $datas)
              <tr>
                <td>{{ $datas->nrn_aldeia }}</td>
                <td>{{ $datas->nrn_suku }}</td>
                <td>{{ $datas->nrn_postu }}</td>
                <td>{{ $datas->nrn_munisipiu }}</td>
                <td>
                  <a href="{{ route('aldeia.edit', $datas->id) }}" class="btn btn-primary btn-xs">Hadia</a>
                  <form action="{{ route('aldeia.destroy', $datas->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-xs">Hamos</button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
                  <tr>
                    <td colspan="5"><h4 class="text-center text-danger">Dadus Seidauk Iha</h4></td>
                  </tr>
              @endif
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

</div>
@endsection