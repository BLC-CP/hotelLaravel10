<?php

namespace App\Http\Controllers;

use App\Models\Kuartu;
use Illuminate\Http\Request;

class KuartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kuartu = Kuartu::orderBy('created_at', 'DESC')->get();
        return view('kuartu.index', [
            'title' => 'Kuartu',
            'active' => 'kuartu',
            'data' => $kuartu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kuartu.create', [
            'title' => 'Form Aumenta Dadus Kuartu',
            'active' => 'kuartu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nu_kuartu' => 'required',
            'tipu_kuartu' => 'required'
        ], [
            'nu_kuartu.required' => 'Numeru Kuartu Tenke Priense',
            'tipu_kuartu.required' => 'Tipu Kuartu Tenke Priense'
        ]);
        Kuartu::create($request->All());
        return redirect()->route('kuartu.index')->with('status', 'Dadus Aumenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kuartu $kuartu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Kuartu::findOrFail($id);
        return view('kuartu.edit', [
            'title' => 'Form Hadia Dadus Kuartu',
            'active' => 'kuartu',
            'kuartu' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nu_kuartu' => 'required',
            'tipu_kuartu' => 'required'
        ], [
            'nu_kuartu.required' => 'Numeru Kuartu Tenke Priense',
            'tipu_kuartu.required' => 'Tipu Kuartu Tenke Priense'
        ]);
        $hadia = Kuartu::findOrFail($id);
        $hadia->update($request->All());

        return redirect()->route('kuartu.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Kuartu::findOrFail($id);
        $hamos->delete();

        return redirect()->route('kuartu.index')->with('status', 'Dadus Hamos Ona');
    }
}
