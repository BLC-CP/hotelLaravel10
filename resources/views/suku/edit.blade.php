@extends('welcome')

@section('content')
<div class="container">
   
  <div class="row mt-3">
   <div class="col-lg-12">
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Form Hadia Dadus Suku</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('suku.update', $suku->id) }}" method="POST">
            @csrf
            @method('PUT')
           <div class="card-body">
             <div class="form-group">
               <label for="suku">Naran Suku</label>
               <input type="text" class="form-control form-control-sm @error('nrn_suku') is-invalid @enderror " value="{{ old('nrn_suku', $suku->nrn_suku) }}" name="nrn_suku" id="suku" placeholder="Naran Suku">
               @error('nrn_suku')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
             </div>

             <div class="form-group">
                <label for="postu">Dadus Postu</label>
               <select name="id_postu" id="id_postu" class="form-control form-control-sm form-select select2 @error('id_postu') is-invalid @enderror ">
                <option disabled selected>Hili Postu</option>

                @foreach ($postu as $postus)
                    @if (old('id_postu', $postus->id) == $suku->id_postu)
                    <option value="{{ $postus->id }}" selected>{{ $postus->nrn_postu }}</option>
                    @else
                    <option value="{{ $postus->id }}">{{ $postus->nrn_postu }}</option>
                    @endif
                @endforeach

               </select>
               @error('id_postu')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
              </div>
           </div>
           <!-- /.card-body -->

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('suku.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         </form>
       </div>
   </div>
  </div>

</div>
@endsection