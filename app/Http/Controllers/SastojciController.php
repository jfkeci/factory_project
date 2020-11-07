<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jelo;
use App\Models\Sastojak;
use Illuminate\Support\Facades\DB;

class SastojciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sastojci = Sastojak::orderBy('naziv', 'asc')->paginate(10);
        return view('sastojci.index')->with('sastojci', $sastojci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sastojci.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required'
        ]);
        $sastojak = new Sastojak;
        $sastojak->naziv = $request->input('naziv');
        $sastojak->save();

        return redirect('/sastojci')->with('success', 'Sastojak kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sastojak = Sastojak::find($id);

        return view('sastojci.show')->with('sastojak', $sastojak);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sastojak = Sastojak::find($id);
        return view('sastojci.edit')->with('sastojak', $sastojak);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'=>'required'
        ]);
        $sastojak= Sastojak::find($id);
        $sastojak->naziv = $request->input('naziv');
        $sastojak->save();

        return redirect('/sastojci')->with('success', 'Uspješno uređeno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sastojak=Sastojak::find($id);

        $sastojak->delete();
        return redirect('/sastojci')->with('success', 'Uspješno obrisano');
    }
}
