<?php 

use App\Models\Munisipiu;

$mun = Munisipiu::All();

?>

@extends('welcome')

@section('content')
<div class="container">
   
  <div class="row mt-3">
   <div class="col-lg-12">
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">{{ $title }}</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('postu.update', $dataPostu->id) }}" method="POST">
            @csrf
            @method('put')
           <div class="card-body">
             <div class="form-group">
               <label for="postu">Naran Postu</label>
               <input type="text" class="form-control form-control-sm @error('nrn_postu') is-invalid @enderror " value="{{ old('nrn_postu', $dataPostu->nrn_postu) }}" name="nrn_postu" id="postu" placeholder="Naran Postu">
               @error('nrn_postu')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
             </div>

             <div class="form-group">
                <label for="munisipiu">Dadus Munisipiu</label>
               <select name="id_munisipiu" id="id_munisipiu" class="form-control form-control-sm form-select select2">
                <option disabled selected>Hili Munisipiu</option>

                @foreach ($munisipiu as $munisipius)
                @if (old('id_munisipiu', $dataPostu->id_munisipiu) == $munisipius->id)
                <option value="{{ $munisipius->id }}" selected>{{ $munisipius->nrn_munisipiu }}</option>
                @else
                <option value="{{ $munisipius->id }}">{{ $munisipius->nrn_munisipiu }}</option>
                @endif
                @endforeach

               </select>
              </div>
           </div>

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