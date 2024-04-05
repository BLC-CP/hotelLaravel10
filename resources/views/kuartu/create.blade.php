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
         <form role="form" action="{{ route('kuartu.store') }}" method="POST">
            @csrf
           <div class="card-body">
             <div class="form-group">
               <label for="kuartu">Numeru Kuartu</label>
               <input type="text" class="form-control form-control-sm @error('nu_kuartu') is-invalid @enderror " value="{{ old('nu_kuartu') }}" name="nu_kuartu" id="kuartu" placeholder="Numeru Kuartu">
               @error('nu_kuartu')
                 <div class="invalid-feedback">
                  {{ $message }}
                 </div>
               @enderror
             </div>

             <div class="form-group">
              <label for="tkuartu">Tipu Kuartu</label>
              <input type="text" class="form-control form-control-sm @error('tipu_kuartu') is-invalid @enderror " value="{{ old('tipu_kuartu') }}" name="tipu_kuartu" id="tkuartu" placeholder="Tipu Kuartu">
              @error('tipu_kuartu')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
           </div>
           
           <!-- /.card-body -->

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('kuartu.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         </form>
       </div>
   </div>
  </div>

</div>
@endsection