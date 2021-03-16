<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Experiencia;
use App\Models\User;

class ComentarioController extends Controller
{
    //
    public function create(Request $request)
    {
        $comentario=new Comentario();
        $experiencia=Experiencia::find($request);
        return view('comentario.create',compact('experiencia','comentario'));
    }
    public function store(Request $request)
    {
        $entrada=$request->all();
        Comentario::create($entrada);
        return redirect('experiencia');
    }

}
