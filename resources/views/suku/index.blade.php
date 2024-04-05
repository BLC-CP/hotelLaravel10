@extends('welcome')

@section('content')
<div class="container">

  {{-- @if(Session()->has('status'))
  <button type="button" class="btn btn-success swalDefaultSuccess">
    {{ session('status') }}
  </button>
  @endif --}}
   
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <a href="{{ route('suku.create') }}" class="btn btn-success btn-xs my-2"><i class="fa fa-plus"></i> Aumenta Dadus</a>
            <thead>
            <tr>
              <th>Suku</th>
              <th>Postu</th>
              <th>Munisipiu</th>
              <th>Aksaun</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($data as $datas)
            <tr>
              <td>{{ $datas->nrn_suku }}</td>
              <td>{{ $datas->nrn_postu }}</td>
              <td>{{ $datas->nrn_munisipiu }}</td>
              <td>
                <a href="{{ route('suku.edit', $datas->id) }}" class="btn btn-primary btn-xs">Hadia</a>
                <form action="{{ route('suku.destroy', $datas->id) }}" method="POST" class="d-inline">
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