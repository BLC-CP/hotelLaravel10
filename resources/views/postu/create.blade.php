@extends('welcome')

@section('content')
<div class="container">
   
  <div class="row mt-3">
   <div class="col-lg-12">
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Form Aumenta Dadus Postu</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('postu.store') }}" method="POST">
            @csrf
           <div class="card-body">
             <div class="form-group">
               <label for="postu">Naran Postu</label>
               <input type="text" name="nrn_postu" class="form-control form-control-sm @error('nrn_postu') is-invalid @enderror " id="postu" value="{{ old('nrn_postu') }}" placeholder="Naran Postu">
               <div class="invalid-feedback">
                @error('nrn_postu')
                  {{ $message }}
                @enderror
               </div>
             </div>

             <div class="form-group">
                <label for="munisipiu">Dadus Munisipiu</label>
               <select name="id_munisipiu" id="id_munisipiu"  class="form-control form-control-sm form-select select2 @error('id_munisipiu') is-invalid @enderror " >

                <option disabled selected>Hili Munisipiu</option>

                @foreach ($munisipiu as $munisipius)
                  @if (old('id_munisipiu') == $munisipius->id)
                  <option value="{{ $munisipius->id }}" selected>{{ $munisipius->nrn_munisipiu }}</option>
                  @else
                  <option value="{{ $munisipius->id }}">{{ $munisipius->nrn_munisipiu }}</option>
                  @endif
                @endforeach

               </select>
               <div class="invalid-feedback">
                @error('id_munisipiu')
                  {{ $message }}
                @enderror
               </div>
              </div>
           </div>
           <!-- /.card-body -->

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('postu.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         </form>
       </div>
   </div>
  </div>

</div>
@endsection