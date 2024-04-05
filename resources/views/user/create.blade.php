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
         <form role="form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="card-body">
             <div class="form-group">
               <label for="user">Naran User</label>
               <input type="text" name="nrn_user" class="form-control form-control-sm @error('nrn_user') is-invalid @enderror " id="user" value="{{ old('nrn_user') }}" placeholder="Naran user">
               <div class="invalid-feedback">
                @error('nrn_user')
                  {{ $message }}
                @enderror
               </div>

               <label for="email">Email</label>
            <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror " id="email" value="{{ old('email') }}" placeholder="Email">
            <div class="invalid-feedback">
             @error('email')
               {{ $message }}
             @enderror
            </div>

            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror " id="password" value="{{ old('password') }}" placeholder="Password">
            <div class="invalid-feedback">
             @error('password')
               {{ $message }}
             @enderror
            </div>

            <label for="foto">Foto User</label>
            <input type="file" name="foto" class="form-control form-control-sm @error('foto') is-invalid @enderror " id="foto" value="{{ old('foto') }}">
            <div class="invalid-feedback">
             @error('foto')
               {{ $message }}
             @enderror
            </div>

             </div>
           </div>

            

           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-xs">Submit</button>
             <a href="{{ route('user.index') }}" class="btn btn-info btn-xs">Fila</a>
            <button type="reset" name="rese" class="btn btn-warning btn-xs">Reset</button>
           </div>
         </form>
       </div>
   </div>
  </div>

</div>
@endsection