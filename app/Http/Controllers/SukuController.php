<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Suku;
use App\Models\Postu;
use Illuminate\Http\Request;

class SukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suku = DB::table('sukus')

        ->join('postus', 'sukus.id_postu', '=', 'postus.id')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->select('sukus.*', 'postus.nrn_postu', 'munisipius.nrn_munisipiu')
        ->get();

        return view('suku.index', [
        'title' => 'Suku', 
        'active' => 'suku',
        'data' => $suku
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $postu = Postu::All();
        return view('suku.create', [
            'title' => 'Aumenta Dadus Suku',
            'active' => 'suku',
            'postu' => $postu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrn_suku' => 'required',
            'id_postu' => 'required'
        ],
        [
            'nrn_suku.required' => 'Naran Suku Tenke Prinse',
            'id_postu.required' => 'Tenke Hili Postu' 
        ]);
        Suku::create($request->All());
        return redirect()->route('suku.index')->with('status', 'Dadus Aumenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suku $suku)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $suku = Suku::findOrFail($id);
        return view('suku.edit', [
            'title' => 'Hadia Dadus Suku',
            'active' => 'suku',
            'suku' => $suku,
            'postu' => Postu::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nrn_suku' => 'required',
            'id_postu' => 'required'
        ],
    [
        'nrn_suku.required' => 'Naran Suku Tenke Prinense',
        'id_postu.required' => 'Tenke Hili Postu'
    ]);
        $suku = Suku::findOrFail($id);
        $suku->update($request->All());
        
        return redirect()->route('suku.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Suku::findOrFail($id);
        $hamos->delete();

        return redirect()->route('suku.index')->with('status', 'Dadus Hamos Ona');
    }
}
