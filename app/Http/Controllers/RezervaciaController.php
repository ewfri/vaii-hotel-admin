<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezervacia;

class RezervaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    // * @return \Illuminate\Http\Response
    public function index()
    {
        $rezervacie = Rezervacia::all();

        return view('rezervacie/index',compact('rezervacie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('rezervacie/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    //* @return \Illuminate\Http\Response
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'meno' => 'required|max:255',
            'priezvisko' => 'required|max:255',
            'od' => 'required|date|after:today',
            'do' => 'required|date|after:od',
            'osoby' => 'required',
        ]);
        $show = Rezervacia::create($validatedData);

        return redirect('/rezervacie')->with('success', 'Rezervácia bola uložená.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    //* @return \Illuminate\Http\Response
    public function edit($id)
    {
        $rezervacia = Rezervacia::findOrFail($id);

        return view('rezervacie/edit', compact('rezervacia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    //* @return \Illuminate\Http\Response
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'meno' => 'required|max:255',
            'priezvisko' => 'required|max:255',
            'od' => 'required|date|after:today',
            'do' => 'required|date|after:od',
            'osoby' => 'required',
        ]);
        Rezervacia::whereId($id)->update($validatedData);

        return redirect('/rezervacie')->with('success', 'Rezervácia bola upravená.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    //* @return \Illuminate\Http\Response
    public function destroy($id)
    {
        $rezervacia = Rezervacia::findOrFail($id);
        $rezervacia->delete();

        return redirect('/rezervacie')->with('success', 'Rezervácia bola odstránená.');
    }
}
