@extends('welcome')

@section('content')
<div class="container">
   
  <div class="row mt-3">
   <div class="col-lg-12">
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Form Hadia Dadus Aldeia</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('aldeia.update', $aldeia->id) }}" method="POST">
            @csrf
            @method('PUT')
           <div class="card-body">
             <div class="form-group">
               <label for="aldeia">Naran Aldeia</label>
               <input type="text" class="form-control form-control-sm @error('nrn_aldeia') is-invalid @enderror " value="{{ old('nrn_aldeia', $aldeia->nrn_aldeia) }}" name="nrn_aldeia" id="aldeia" placeholder="Naran Aldeia">
               @error('nrn_aldeia')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
             </div>

             <div class="form-group">
                <label for="suku">Dadus Suku</label>
               <select name="id_suku" id="id_suku" class="form-control form-control-sm form-select select2 @error('id_suku') is-invalid @enderror ">
                <option disabled selected>Hili Suku</option>

                @foreach ($suku as $sukus)
                    @if (old('id_suku', $aldeia->id_suku) == $sukus->id)
                    <option value="{{ $sukus->id }}" selected>{{ $sukus->nrn_suku }}</option>
                    @else
                    <option value="{{ $sukus->id }}">{{ $sukus->nrn_suku }}</option>
                    @endif
                @endforeach

               </select>
               @error('id_suku')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
              </div>
           </div>
           <!-- /.card-body -->

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('aldeia.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         </form>
       </div>
   </div>
  </div>

</div>
@endsection