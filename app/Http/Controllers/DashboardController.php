<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Experiencia::query()->where('user_id', Auth::user()->id);

        if ($q = $request->get('q')) {
            $query->where('titulo', 'like', "%$q%");
        }

        $experiencias = $query->orderBy('id', 'desc')->paginate(3);

        return view('dashboard', compact('experiencias', 'request'));
    }
}
