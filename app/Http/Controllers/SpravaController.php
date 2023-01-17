<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprava;
use Illuminate\Support\Facades\Validator;

class SpravaController extends Controller
{
    public function index()
    {
        return view('spravy.index');
    }

    public function fetchmessages()
    {
        $messages = Sprava::all();
        return response()->json([
            'spravas'=>$messages,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'meno',
            'priezvisko',
            'email'=>'required|email|max:191',
            'telefon',
            'predmet'=>'required|max:90|min:2',
            'obsah'=>'required|min:10'
        ]);
        $validatedData['vybavene'] = false;
        Sprava::create($validatedData);
        return redirect('/');
    }

    public function reviewMessage($id)
    {
        $sprava = Sprava::find($id);
        if($sprava)
        {
            return response()->json([
                'status'=>200,
                'sprava'=> $sprava,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Message Not Found.'
            ]);
        }
    }

    public function sendEmail(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'obsah'=> 'required|min:10',
            'predmet'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $sprava = Sprava::find($id);
            if($sprava) {
                $sprava->vybavene = true;
                $sprava->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Email has been sent.'
                ]);
            } else {
                return response()->json([
                    'status'=>404,
                    'message'=>'Message Not Found.']);
            }
        }
    }
}
