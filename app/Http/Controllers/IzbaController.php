<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Izba;

class IzbaController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $izby = Izba::all();

        return view('izby/index',compact('izby'));
    }

    public function load()
    {
        $izby = Izba::all();

        return view('client/ubytovanie',compact('izby'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('izby/create');
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
        $data = $request->validate([
            'obrazok' => 'required|image',
            'popis' => 'required',
            'izba' => 'required'
        ]);

        if($request->file('obrazok')){
            $file= $request->file('obrazok');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
            $data['obrazok']= $filename;
        }
        Izba::create($data);
        return redirect('admin/izby')->with('success', 'Izba bola uložená.');
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
        $izby = Izba::findOrFail($id);

        return view('izby/edit', compact('izby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'obrazok => image',
            'popis' => 'required',
            'izba' => 'required'
        ]);


        if($request->file('obrazok')){
            $old = Izba::findOrFail($id);
            File::delete(public_path('img') | $old['obrazok']);
            $file= $request->file('obrazok');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
            $data['obrazok']= $filename;
        }
        Izba::whereId($id)->update($data);
        return redirect('admin/izby')->with('success', 'Izba bola upravená.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $izby = Izba::findOrFail($id);
        File::delete(public_path('img') | $izby['obrazok']);
        $izby->delete();

        return redirect('admin/izby')->with('success', 'Izba bola odstránená.');
    }
}
