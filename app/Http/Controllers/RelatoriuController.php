<?php

namespace App\Http\Controllers;
use App\Models\Kliente;
use App\Models\Aldeia;
use App\Models\Suku;
use App\Models\Postu;
use App\Models\Munisipiu;
use App\Models\Kuartu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatoriuController extends Controller
{

    public function index(Request $request)
    {

        $klientes = DB::table('klientes')
        ->join('aldeias', 'klientes.id_aldeia', '=', 'aldeias.id')
        ->join('sukus', 'aldeias.id_suku', '=', 'sukus.id')
        ->join('postus', 'sukus.id_postu', '=', 'postus.id')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->join('kuartus', 'klientes.id_kuartu', '=', 'kuartus.id')
        ->select('klientes.*', 'aldeias.nrn_aldeia', 'kuartus.tipu_kuartu', 'sukus.nrn_suku', 'postus.nrn_postu', 'munisipius.nrn_munisipiu');
        
        $tinan          =  $request->get('tinan');
        $fulan          =  $request->get('fulan');
        $aldeia         =  $request->get('aldeia');
        $kuartu         =  $request->get('kuartu');
        $suku           =  $request->get('suku');
        $postu          =  $request->get('postu');
        $munisipiu      =  $request->get('munisipiu');
        $data_hahu      =  $request->get('data_hahu');
        $data_remata    =  $request->get('data_remata');

        $dtAldeia       = Aldeia::All();
        $dtKuartu       = Kuartu::All();
        $dtSuku         = Suku::All();
        $dtPostu        = Postu::All();
        $dtMunisipiu    = Munisipiu::All();
        // $dtKliente      = Kliente::All();
        
        

        if ($tinan) {
            $klientes->whereYear('data_checking', $tinan);
        }

        if($fulan){
            $klientes->whereMonth('data_checking', $fulan);
        }

        if($data_hahu && $data_remata){
            $klientes->whereBetween('data_checking',[$data_hahu, $data_remata]);
            // Kliente::whereBetween('created_at', [$data_hahu, $data_remata])->get();
        }

        if ($aldeia) {
            $klientes->where('id_aldeia', $aldeia);
        }

        if ($suku) {
            $klientes->where('id_suku', $suku);
        }

        if ($postu) {
            $klientes->where('id_postu', $postu);
        }

        if($munisipiu){
            $klientes->where('id_munisipiu', $munisipiu);
        }

        // $klientes = Kliente::whereBetween('created_at', [$data_hahu, $data_remata])->get();
        if ($kuartu) {
            $klientes->where('id_kuartu', $kuartu);
        }
        $klientes = $klientes->get();

        // id_aldeia ita foti husi naran filed nebe mak iha tabela kliente nia laran
        $aldeias = Kliente::distinct()->pluck('id_aldeia');
        $aldeias = Kliente::distinct()->pluck('id_kuartu');
        $aldeias = Aldeia::distinct()->pluck('id_suku');
        $aldeias = Suku::distinct()->pluck('id_postu');
        $aldeias = Postu::distinct()->pluck('id_munisipiu');

        return view('relatoriu.formrelatoriu', 
        [
        'title'         => 'Dadus', 
        'active'        => 'relatoriu',
        'dataAldeia'    => $dtAldeia,
        'dataKuartu'    => $dtKuartu,
        'dataSuku'      => $dtSuku,
        'dataPostu'     => $dtPostu,
        'dataMunisipiu' => $dtMunisipiu
        ], 
        compact('klientes', 'aldeias')
);}



}