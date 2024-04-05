@extends('welcome')

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <a href="{{ route('kliente.create') }}" class="btn btn-success btn-xs my-2"><i class="fa fa-plus"></i> Aumenta Dadus</a>
            <thead>
            <tr>
              <th>No</th>
              <th>Naran</th>
              <th>Hela Fatin</th>
              <th>Munisipiu</th>
              <th>Numeru Kuartu</th>
              <th>Data Checking</th>
              <th>Data Cehckout</th>
              <th>Aksaun</th>
            </tr>
            </thead>
            <tbody>
              @if ($data->count() > 0)
              @foreach ($data as $datas)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $datas->nrn_kliente }}</td>
                <td>{{ $datas->hela_fatin }}</td>
                <td>{{ $datas->nrn_munisipiu }}</td>
                <td>{{ $datas->tipu_kuartu }} & {{ $datas->nu_kuartu }}</td>
                <td>{{ $datas->data_checking }}</td>
                <td>{{ $datas->data_checkout }}</td>
                <td>
                  <a href="{{ route('kliente.edit', $datas->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                  <form action="{{ route('kliente.destroy', $datas->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
                  <tr>
                    <td colspan="8"><h4 class="text-center text-danger">Dadus Seidauk Iha</h4></td>
                  </tr>
              @endif
              
            
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

</div>
@endsection