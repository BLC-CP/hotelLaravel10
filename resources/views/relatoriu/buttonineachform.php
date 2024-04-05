@extends('welcome')

@section('content')
<div class="container">
  <div class="row mt-3" id="form">

    {{-- Relatoriu Kada Tinan --}}
   <div class="col-lg-3 col-md-6">
    <form action="{{ route('relatoriu.index') }}" action="POST">
        <label class="text-center">Dadus Kada Tinan</label>
        <div class="input-group">
            <select name="tinan" class="form-control form-control-sm select2">
                <option disabled selected>Hili Tinan</option>
                @for ($tinan = now()->year; $tinan >= 1950; $tinan--)
                <option value="{{ $tinan }}" {{ request('tinan') == $tinan ? 'selected' : '' }} >{{ $tinan }}</option>
                @endfor

            </select>
            <button type="submit" class="btn btn-primary btn-sm">Buka</button>
        </div>
    </form>
   </div>

   {{-- Relatoriu Kada Fulan --}}
   <div class="col-lg-3 col-md-6">
    <form action="{{ route('relatoriu.index') }}" action="POST">
        <label class="text-center">Dadus Kada Fulan</label>
        <div class="input-group">
            <select name="fulan" class="form-control form-control-sm select2">
                <option disabled selected>Hili Fulan</option>
                @foreach (range(1, 12) as $fulan)
                <option value="{{ $fulan }}" {{ request('fulan') == $fulan ? 'selected' : '' }} >{{ date('F', mktime(0, 0, 0, $fulan, 1)) }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Buka</button>
        </div>
    </form>
   </div>


  </div>

  <div class="row mt-4">
    <div class="col-lg-12">
        @include('relatoriu.header')
    </div>
  </div>

  <hr>

  <div class="row mt-4">
    <div class="div col-md-3">
        <button id="printButton" class="btn btn-success btn-sm mb-2 w-100"><i class="fa fa-print"></i> Print</button>
    </div>
    <div class="div col-md-3">
        <a href="relatoriu"  id="fila" class="btn btn-warning btn-sm mb-2 w-100"><i class="fa fa-backward"></i> Reset</a>
    </div>
    <div class="div col-md-6"></div>
    <div class="col-lg-12 col-md-12">
        <table class="table table-bordered table-striped table-sm" id="dataToPrint">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Naran</th>
                    <th>Hela Fatin</th>
                    <th>Aldeia</th>
                    <th>Kuartu</th>
                    <th>Data Checking</th>
                    <th>Data Checkout</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($klientes as $datas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $datas->nrn_kliente }}</td>
                    <td>{{ $datas->hela_fatin }}</td>
                    <td>{{ $datas->id_aldeia }}</td>
                    <td>{{ $datas->id_kuartu }}</td>
                    <td>{{ $datas->data_checking }}</td>
                    <td>{{ $datas->data_checkout }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <script>



    document.getElementById("printButton").addEventListener("click", function() {
    fila.style.display = "none";
    form.style.display = "none";
    printButton.style.display = "none";
    footer.style.display = "none";
    window.print();
});
    </script>

</div>
@endsection

