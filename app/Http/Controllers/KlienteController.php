<?php

namespace App\Http\Controllers;

use App\Models\Kliente;
use App\Models\Aldeia;
use App\Models\Kuartu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kliente = DB::table('klientes')
        ->join('aldeias', 'klientes.id_aldeia', '=', 'aldeias.id')
        ->join('sukus', 'aldeias.id_suku', '=', 'sukus.id')
        ->join('postus', 'sukus.id_postu', '=', 'postus.id')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->join('kuartus', 'klientes.id_kuartu', '=', 'kuartus.id')
        ->select('klientes.*', 'aldeias.nrn_aldeia', 'sukus.nrn_suku', 'postus.nrn_postu', 'munisipius.nrn_munisipiu', 'kuartus.nu_kuartu', 'kuartus.tipu_kuartu')
        ->get();

        return view('kliente.index', [
            'title' => 'Kliente',
            'active' => 'kliente',
            'data' => $kliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kliente.create', [
            'title' => 'Form Aumenta Dadus Kliente',
            'active' => 'kliente',
            'aldeia' => Aldeia::All(),
            'kuartu' => Kuartu::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrn_kliente' => 'required',
            'hela_fatin' => 'required',
            'id_aldeia' => 'required',
            'id_kuartu' => 'required',
            'data_checking' => 'required|date|after_or_equal:today',
            'data_checkout' => 'required|date|after:data_checking'
        ], [
            'nrn_kliente.required' => 'Naran Kliente Tenke Priense',
            'hela_fatin.required' => 'Hela Fatin Tenke Priense',
            'id_aldeia.required' => 'Tenke Hili Aldeia',
            'id_kuartu.required' => 'Tenke Hili Kuartu',
            'data_checking.required' => 'Data Checking Tenke Priense',
            'data_checking.after_or_equal' => 'Data Checking Hahu iha Loron Ohin, Labele Pasadu',
            'data_checkout.required' => 'Data Checkout Tenke Priense',
            'data_checkout.after' => 'Data Checkout Labele Kiik Liu Ka Hanesan Ho Data Checking'
        ]);
        Kliente::create($request->All());
        return redirect()->route('kliente.index')->with('status', 'Dadus Aumenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kliente $kliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 
        $kliente = Kliente::findOrFail($id);
        return view('kliente.edit', [
            'title' => 'Form Edit Dadus Kliente',
            'active' => 'kliente',
            'kliente' => $kliente,
            'aldeia' => ALdeia::All(),
            'kuartu' => Kuartu::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nrn_kliente' => 'required',
            'hela_fatin' => 'required',
            'id_aldeia' => 'required',
            'id_kuartu' => 'required',
            'data_checking' => 'required|date|after_or_equal:today',
            'data_checkout' => 'required|date|after_or_equal:today'
        ], [
            'nrn_kliente.required' => 'Naran Kliente Tenke Priense',
            'hela_fatin.required' => 'Hela Fatin Tenke Priense',
            'id_aldeia.required' => 'Tenke Hili Aldeia',
            'id_kuartu.required' => 'Tenke Hili Kuartu',
            'data_checking.required' => 'Data Checking Tenke Priense',
            'data_checking.after_or_equal' => 'Data Checking Labele Pasadu',
            'data_checkout.required' => 'Data Checkout Tenke Priense',
            'data_checkout.after_or_equal' => 'Data Checkout Labele Pasadu'
        ]);
        $hadia = Kliente::findOrFail($id);
        $hadia->update($request->All());
        return redirect()->route('kliente.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Kliente::findOrFail($id);
        $hamos->delete();

        return redirect()->route('kliente.index')->with('status', 'Dadus Hamos Ona');
    }

    public function formPrint()
    {
        $kliente = DB::table('klientes')
        ->join('aldeias', 'klientes.id_aldeia', '=', 'aldeias.id')
        ->join('sukus', 'aldeias.id_suku', '=', 'sukus.id')
        ->join('postus', 'sukus.id_postu', '=', 'postus.id')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->join('kuartus', 'klientes.id_kuartu', '=', 'kuartus.id')
        ->select('klientes.*', 'aldeias.nrn_aldeia', 'sukus.nrn_suku', 'postus.nrn_postu', 'munisipius.nrn_munisipiu', 'kuartus.nu_kuartu', 'kuartus.tipu_kuartu')
        ->get();

        return view('kliente.formPrint', ['title' => 'Form Print Relatorio', 'active' => 'print', 'data' => $kliente]);

    }

}
