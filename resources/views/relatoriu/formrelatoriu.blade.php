@extends('welcome')

@section('content')
<div class="container">

    <form action="{{ route('relatoriu.index') }}" action="POST">
  <div class="row mt-3" id="form">
       
        {{-- Relatoriu Kada Tinan --}}
        <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Tinan</label>
            <div class="form-group">
                <select name="tinan" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Tinan</option>
                    @for ($tinan = now()->year; $tinan >= 1950; $tinan--)
                    <option value="{{ $tinan }}" {{ request('tinan') == $tinan ? 'selected' : '' }} >{{ $tinan }}</option>
                    @endfor

                </select>
            </div>
        </div>

         {{-- Relatoriu Kada Fulan --}}
         <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Fulan</label>
            <div class="form-group">
                <select name="fulan" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Fulan</option>
                    @foreach (range(1, 12) as $fulan)
                    <option value="{{ $fulan }}" {{ request('fulan') == $fulan ? 'selected' : '' }} >{{ date('F', mktime(0, 0, 0, $fulan, 1)) }}</option>
                    @endforeach
                </select>
                
            </div>
        </div>

        {{-- Relatoriu Kada Aldeia --}}
        <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Aldeia</label>
            <div class="form-group">
                <select name="aldeia" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Aldeia</option>
                    @foreach ($dataAldeia as $dataAldeias)
                        <option value="{{ $dataAldeias->id }}" {{ request('aldeia') == $dataAldeias ? 'selected' : '' }} >{{ $dataAldeias->nrn_aldeia }}</option>
                    @endforeach

                </select>
                
            </div>
        </div>

        {{-- Relatoriu Kada Kuartu --}}
        <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Kuartu</label>
            <div class="form-group">
                <select name="kuartu" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Kuartu</option>
                    @foreach ($dataKuartu as $datakuartus)
                        <option value="{{ $datakuartus->id }}" {{ request('kuartu') == $datakuartus ? 'selected' : '' }} >{{ $datakuartus->tipu_kuartu }}</option>
                    @endforeach

                </select>
                
            </div>
        </div>

        {{-- Relatoriu Kada suku --}}
        <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Suku</label>
            <div class="form-group">
                <select name="suku" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Suku</option>
                    @foreach ($dataSuku as $datasukus)
                        <option value="{{ $datasukus->id }}" {{ request('suku') == $datasukus ? 'selected' : '' }} >{{ $datasukus->nrn_suku }}</option>
                    @endforeach

                </select>
                
            </div>
        </div>

        {{-- Relatoriu Kada Postu --}}
        <div class="col-lg-3 col-md-6">
            <label class="text-center">Dadus Kada Postu</label>
            <div class="form-group">
                <select name="postu" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Postu</option>
                    @foreach ($dataPostu as $dataPostus)
                        <option value="{{ $dataPostus->id }}" {{ request('postu') == $dataPostus ? 'selected' : '' }} >{{ $dataPostus->nrn_postu }}</option>
                    @endforeach

                </select>
                
            </div>
        </div>

        {{-- Relatoriu Kada Munisipiu --}}
        <div class="col-lg-3 col-md-6">
            <label for="munisipiu">Dadus Kada Munisipiu</label>
            <div class="form-group">
                <select name="munisipiu" id="munisipiu" class="form-control form-control-sm select2">
                    <option disabled selected>Hili Munisipiu</option>
                    @foreach ($dataMunisipiu as $dataMunisipius)
                    <option value="{{ $dataMunisipius->id }}" {{ request('munisipiu') == $dataMunisipius ? 'selected' : '' }} >{{ $dataMunisipius->nrn_munisipiu }}</option>
                    @endforeach

                </select>
            </div>
        </div>       
        
        {{-- Relatoriu Kada Periodo --}}
        <div class="col-lg-3 col-md-6">
            <label for="date">Dadus Kada Periodo</label>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="date" id="date" name="data_hahu" class="form-control form-control-sm d-inline-block">
                    </div>
                    <div class="col-6">
                        <input type="date" id="date" name="data_remata" class="form-control form-control-sm d-inline-block">
                    </div>
                </div>
            </div>
        </div>       

    </div>

    <div class="row mt-3" id="buttons">
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fa fa-search"></i></i> Buka</button>
        </div>
        <div class="col-lg-4">
            <a href="relatoriu"  id="fila" class="btn btn-warning btn-sm mb-2 w-100"><i class="fa fa-backward"></i> Reset <i class="fa fa-home"></i></a>
        </div>
        <div class="col-lg-4">
            <button id="printButton" class="btn btn-success btn-sm mb-2 w-100"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</form>

  <div class="row mt-4">
    <div class="col-lg-12">
        @include('relatoriu.header')
    </div>
  </div>

  <hr>

  <div class="row mt-4">
    <div class="col-lg-12 col-md-12">
        <table class="table table-bordered table-striped table-sm" id="dataToPrint">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Naran</th>
                    <th>Hela Fatin</th>
                    <th>Aldeia</th>
                    <th>Suku</th>
                    <th>Postu</th>
                    <th>Munisipiu</th>
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
                    <td>{{ $datas->nrn_aldeia }}</td>
                    <td>{{ $datas->nrn_suku }}</td>
                    <td>{{ $datas->nrn_postu }}</td>
                    <td>{{ $datas->nrn_munisipiu }}</td>
                    <td>{{ $datas->tipu_kuartu }}</td>
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
    buttons.style.display = "none";
    window.print();
    });
    </script>

</div>
@endsection

