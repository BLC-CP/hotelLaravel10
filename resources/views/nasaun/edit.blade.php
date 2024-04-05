@extends('welcome')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Hadia Dadus Nasaun</h3>
                    </div>
                    <form role="form" action="{{ route('nasaun.update', $datas->id) }}" method="POST">
                       @csrf
                       @method('put')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nasaun">Naran Nasaun</label>
                          <input type="text" name="nrn_nasaun" value="{{ old('nrn_nasaun', $datas->nrn_nasaun) }}" class="form-control form-control-sm @error('nrn_nasaun') is-invalid @enderror " id="nasaun" placeholder="Naran Nasaun">

                          <div class="invalid-feedback">
                            @error('nrn_nasaun')
                              {{ $message }}
                            @enderror
                          </div>

                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                        <a href="{{ route('nasaun.index') }}" class="btn btn-info btn-xs">Fila</a>
                        <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
                      </div>
                    </form>
                  </div>

            </div>
        </div>
    </div>

@endsection