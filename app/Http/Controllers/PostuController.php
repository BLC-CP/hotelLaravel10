<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Munisipiu;
use App\Models\Postu;
use Illuminate\Http\Request;

class PostuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $postu = DB::table('postus')
        ->join('munisipius', 'postus.id_munisipiu', '=', 'munisipius.id')
        ->select('postus.*', 'munisipius.nrn_munisipiu')
        ->get();

        $count = DB::table('postus')->count();

        return view('postu.index', [
        'title' => 'Postu', 
        'active' => 'postu',
        'data' => $postu,
        'counts' => $count
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $munisipiu = Munisipiu::All();
        return view('postu.create', [
        'title' => 'Postu', 
        'active' => 'postu',
        'munisipiu' => $munisipiu
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrn_postu' => 'required',
            'id_munisipiu' => 'required'
        ],
        [
            'nrn_postu.required' => 'Naran Postu Tenke Priense',
            'id_munisipiu.required' => 'Tenke Hili Munisipiu'
        ]
    );
        Postu::create($request->All());

        return redirect()->route('postu.index')->with('status', 'Dadus Aumenta Ona');
    }

    /**
     * Display the specified resource.
     */
    public function show(Postu $postu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $Postu = Postu::findOrFail($id);
        return view('postu.edit', [
            'title' => 'Form Hadia Dadus Postu',
            'active' => 'postu',
            'dataPostu' => $Postu,
            'munisipiu' => Munisipiu::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nrn_postu' => 'required',
            'id_munisipiu' => 'required'
        ],
        [
            'nrn_postu.required' => 'Naran Potu Tenke Priense',
            'id_munisipiu.required' => 'Tekne Hili Munisipiu'
        ]
        );
        $postu = Postu::findOrFail($id);
        $postu->update($request->ALl());

        return redirect()->route('postu.index')->with('status', 'Dadus Hadia Ona');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hamos = Postu::findOrFail($id);
        $hamos->delete();

        return redirect()->route('postu.index')->with('status', 'Dadus Hamos Ona');
    }
}
