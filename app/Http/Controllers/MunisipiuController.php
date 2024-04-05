<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nasaun;
use App\Models\Munisipiu;

class MunisipiuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataMunisipiu = Munisipiu::orderBy('created_at', 'DESC')->get();
        return view('munisipiu.index', [
            'title' => 'Pagina Munisipiu',
            'active' => 'munisipiu',
            'data' => $dataMunisipiu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('munisipiu.create', [
            'title' => 'Aumenta Dadus Munisipiu',
            'active' => 'munisipiu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nrn_munisipiu' => 'required'
        ],
        [
            'nrn_munisipiu.required' => 'Naran Munisipiu Tenke Prinese'
        ]
    );
        Munisipiu::create($request->All());
        return redirect()->route('munisipiu.index')->with('status', 'Dadus Aumenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Munisipiu $munisipiu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $munisipiu = Munisipiu::findOrFail($id);
        return view('munisipiu.edit', [
            'title' => 'Hadia Dadus Munisipiu',
            'active' => 'munisipiu',
            'datas' => $munisipiu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nrn_munisipiu' => 'required'
        ],
        [
            'nrn_munisipiu.required' => 'Naran Munispiu Tenke Priense'
        ]
        );
        $munisipiu = Munisipiu::findOrFail($id);
        $munisipiu->update($request->All());

        return redirect()->route('munisipiu.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Munisipiu::findOrFail($id);
        $hamos->delete();

        return redirect()->route('munisipiu.index')->with('statusHamos', 'Dadus Hamos Ona');

    }
}
