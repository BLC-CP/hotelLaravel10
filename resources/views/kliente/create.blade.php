@extends('welcome')

@section('content')
<div class="container">
   
  <div class="row mt-3">
   <div class="col-lg-12">
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">{{ $title }}</h3>
         </div>
           <div class="card-body">
            <form action="{{ route('kliente.store') }}" method="POST">
              @csrf
             <div class="form-group">
               <label for="nrn_kliente">Naran Kleinte</label>
               <input type="text" value="{{ old('nrn_kliente') }}" class="form-control form-control-sm @error('nrn_kliente') is-invalid @enderror " name="nrn_kliente" id="nrn_kliente" placeholder="Naran Kleinte">
               @error('nrn_kliente')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
             </div>

             <div class="form-group">
              <label for="hela_fatin">Hela Fatin</label>
              <input type="text" value="{{ old('hela_fatin') }}" class="form-control form-control-sm @error('hela_fatin') is-invalid @enderror " name="hela_fatin" id="hela_fatin" placeholder="Hela Fatin">
              @error('hela_fatin')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
            </div>

             <div class="form-group">
                <label for="aldeia">Dadus Aldeia</label>
               <select name="id_aldeia" id="id_aldeia" value="{{ old('id_aldeia') }}" class="form-control form-control-sm @error('id_aldeia') is-invalid @enderror  form-select select2">
                <option disabled selected>Hili Aldeia</option>

                @foreach ($aldeia as $aldeias)
                @if (old('id_aldeia') == $aldeias->id)
                <option value="{{ $aldeias->id }}" selected>{{ $aldeias->nrn_aldeia }}</option>
                @else
                <option value="{{ $aldeias->id }}">{{ $aldeias->nrn_aldeia }}</option>
                @endif
                @endforeach

               </select>
               @error('id_aldeia')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
             @enderror
              </div>

              <div class="form-group">
                <label for="kuartu">Dadus Kuartu</label>
               <select name="id_kuartu" id="id_kuartu" value="{{ old('id_kuartu') }}" class="form-control form-control-sm @error('id_kuartu') is-invalid @enderror  form-select select2">
                <option disabled selected>Hili Kuartu</option>

                @foreach ($kuartu as $kuartus)
                @if (old('id_kuartu') == $kuartus->id)
                <option value="{{ $kuartus->id }}" selected>{{ $kuartus->nu_kuartu }} / {{ $kuartus->tipu_kuartu }}</option>
                @else
                <option value="{{ $kuartus->id }}">{{ $kuartus->nu_kuartu }} / {{ $kuartus->tipu_kuartu }}</option>
                @endif
                @endforeach

               </select>
               @error('id_kuartu')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
              </div>

              <div class="form-group">
                <label for="checking">Data Checking</label>
                <input type="date" value="{{ old('data_checking') }}" class="form-control form-control-sm @error('data_checking') is-invalid @enderror " name="data_checking" id="checking">
                @error('data_checking')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
              </div>

              <div class="form-group">
                <label for="checkout">Data Checkout</label>
                <input type="date" value="{{ old('data_checkout') }}" class="form-control form-control-sm @error('data_checkout') is-invalid @enderror " name="data_checkout" id="checkout">
                @error('data_checkout')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
              </div>

           </div>

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('kliente.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         
      
         </form>
       </div>
      </div>
  </div>

</div>
@endsection