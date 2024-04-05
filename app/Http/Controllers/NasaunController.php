<?php

namespace App\Http\Controllers;

use App\Models\Nasaun;
use Illuminate\Http\Request;

class NasaunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dnasaun = Nasaun::orderBy('created_at', 'DESC')->get();
        return view('nasaun.index', [
            'title' => 'Pagina Nasaun',
            'active' => 'nasaun',
            'data' => $dnasaun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('nasaun.create', [
            'title' => 'Aumenta Dadus Nasaun',
            'active' => 'nasaun'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nrn_nasaun' => 'required'
        ], 
        [
            'nrn_nasaun.required' => 'Naran Nasaun Tenke Priense'
        ]
    );

        Nasaun::create($request->all());
        return redirect()->route('nasaun.index')->with('status', 'Dadus Aumenta Ona');

    }

    /**
     * Display the specified resource.
     */
    public function show(Nasaun $nasaun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Nasaun::findOrFail($id);
        return view('nasaun.edit', [
            'title' => 'Hadia Dadus Nasaun',
            'active' => 'nasaun',
            'datas' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nrn_nasaun' => 'required'
        ]);
        $nasaun = Nasaun::findOrFail($id);
        $nasaun->update($request->All());

        return redirect()->route('nasaun.index')->with('status', 'Dadus Haida Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $nasaun = Nasaun::findOrFail($id);
        $nasaun->delete();

        return redirect()->route('nasaun.index')->with('status', 'Dadus Hamos Ona');
    }
}
