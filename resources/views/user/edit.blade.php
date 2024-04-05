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
         <form role="form" action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="card-body">
             <div class="form-group">
               <label for="user">Naran User</label>
               <input type="text" name="nrn_user" class="form-control form-control-sm @error('nrn_user') is-invalid @enderror " id="user" value="{{ old('nrn_user', $data->name) }}" placeholder="Naran user">
               <div class="invalid-feedback">
                @error('nrn_user')
                  {{ $message }}
                @enderror
               </div>

               <label for="email">Email</label>
            <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror " id="email" value="{{ old('email', $data->email) }}" placeholder="Email">
            <div class="invalid-feedback">
             @error('email')
               {{ $message }}
             @enderror
            </div>

            {{-- <label for="password">Password</label> --}}
            <input type="hidden" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror " id="password" value="{{ old('password', $data->password) }}" placeholder="Password">
            {{-- <div class="invalid-feedback">
             @error('password')
               {{ $message }}
             @enderror --}}
            {{-- </div> --}}

            <label for="image">Foto User</label>
            <input type="file" name="image" class="form-control form-control-sm @error('image') is-invalid @enderror " id="image" value="{{ old('image', $data->image) }}">
            <div class="invalid-feedback">
             @error('image')
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