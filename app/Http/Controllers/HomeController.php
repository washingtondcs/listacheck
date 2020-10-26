<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tarefas = Tarefas::where('user_id','=',Auth::user()->id)->get();
        $tConcluidas = Tarefas::where('user_id','=',Auth::user()->id)
        ->where('concluida','=',1)
        ->get();
        $tNaoConcluidas = Tarefas::where('user_id','=',Auth::user()->id)
        ->where('concluida','=',0)
        ->get();

        $data = [
            'tarefas'  => $tarefas,
            'tConcluidas' => $tConcluidas,
            'tNaoConcluidas' => $tNaoConcluidas
        ];

        return view('home',$data);
    }
}
