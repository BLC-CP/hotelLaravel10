@extends('welcome')

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <a href="{{ route('user.create') }}" class="btn btn-success btn-xs my-2"><i class="fa fa-plus"></i> Aumenta Dadus</a>
            <thead>
            <tr>
              <th>Naran</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Aksaun</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($data as $datas)
            <tr>
              <td>{{ $datas->name }}</td>
              <td>{{ $datas->email }}</td>
              <td><img src="{{ asset('userProfile/'.$datas->image) }}" alt="" width="40px"></td>
              <td>
                <a href="{{ route('user.edit', $datas->id) }}" class="btn btn-primary btn-xs">Hadia</a>
                <form action="{{ route('user.destroy', $datas->id) }}" method="POST" class="d-inline">
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