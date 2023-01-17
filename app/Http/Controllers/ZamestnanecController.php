<?php

namespace App\Http\Controllers;

use App\Models\Oddelenie;
use App\Models\Zamestnanec;
use Illuminate\Http\Request;

class ZamestnanecController extends Controller
{
    function index()
    {
        $data = Zamestnanec::join('oddelenies', 'zamestnanci.oddelenie_id', '=', 'oddelenies.id')
            ->get(['*','zamestnanci.id as idcko']);
        $oddelenia = Oddelenie::all();

        return view('zamestnanci.index', compact('data', 'oddelenia'));
    }

    public function create()
    {
        $data = Oddelenie::all();
        return view('zamestnanci.create', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'meno' => 'required|max:255',
            'priezvisko' => 'required|max:255',
            'email' => 'required',
            'telefon' => 'required',
            'zamestnany_od' => 'required|date',
            'zamestnany_do',
            'oddelenie_id' => 'required'
        ]);
        Zamestnanec::create($validatedData);
        return redirect('/admin/zamestnanci')->with('success', 'Rezervácia bola uložená.');
    }

    public function show($id)
    {
        $zamestnanci = Zamestnanec::findOrFail($id);
        $oddelenia = Oddelenie::all();
        return view('zamestnanci.show', compact('zamestnanci','oddelenia'));
    }

    public function edit($id)
    {
        $zamestnanci = Zamestnanec::findOrFail($id);
        $oddelenia = Oddelenie::all();
        return view('zamestnanci.edit', compact('zamestnanci','oddelenia'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'meno' => 'required|max:255',
            'priezvisko' => 'required|max:255',
            'zamestnany_do' => 'required|date',
        ]);
        Zamestnanec::whereId($id)->update($validatedData);

        return redirect('/admin/zamestnanci')->with('success', 'Zamestnanec bol upravený.');
    }

    public function destroy($id)
    {
        $zamestnanec = Zamestnanec::findOrFail($id);
        $zamestnanec->delete();

        return redirect('/admin/zamestnanci')->with('success', 'Zamestnec bol odstránený.');
    }
}
