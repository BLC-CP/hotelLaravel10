<?php

namespace App\Http\Controllers;

use App\Models\Suku;
use App\Models\Aldeia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AldeiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $aldeia = DB::table('aldeias')

        ->join('sukus', 'aldeias.id_suku', '=', 'sukus.id')
        ->join('postus', 'sukus.id_postu', '=', 'postus.id')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->select('aldeias.*', 'sukus.nrn_suku', 'postus.nrn_postu', 'munisipius.nrn_munisipiu')
        ->get();

        return view('aldeia.index', [
        'title' => 'Aldeia', 
        'active' => 'aldeia',
        'data' => $aldeia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $suku = Suku::All();
        return view('aldeia.create', [
            'title' => 'Form Aumenta Dadus Aldeia',
            'active' => 'aldeia',
            'suku' => $suku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrn_aldeia' => 'required',
            'id_suku' => 'required'
        ],[
            'nrn_aldeia.required' => 'Naran Aldeia Tenke Priense',
            'id_suku.required' => 'Tenke Hili Suku'
        ]);
        Aldeia::create($request->All());
        return redirect()->route('aldeia.index')->with('status', 'Dadus AUmenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aldeia $aldeia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $aldeia = Aldeia::findOrFail($id);
        return view('aldeia.edit', [
            'title' => 'Form Hadia Dadus Aldeia',
            'active' => 'aldeia',
            'aldeia' => $aldeia,
            'suku' => Suku::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nrn_aldeia' => 'required',
            'id_suku' => 'required'
        ], [
            'nrn_aldeia.required' => 'Naran Aldeia Tenke Priense',
            'id_suku.required' => 'Tenke Hili Suku'
        ]);
        $aldeia = Aldeia::findOrFail($id);
        $aldeia->update($request->All());

        return redirect()->route('aldeia.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Aldeia::findOrFail($id);
        $hamos->delete();

        return redirect()->route('aldeia.index')->with('status', 'Dadus Hamos Ona');
    }
}
