<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TarefasController extends Controller
{
	public function novaTarefa(Request $request){

		$v = Validator::make($request->all(), [
			'titulo' => 'required',
		]);

		if ($v->fails()){
			return redirect()->back()->with('error', 'O campo titulo é obrigatório');
		}else{
			$tarefas  = new tarefas;
			$tarefas->titulo = $request->titulo;
			$tarefas->descricao = $request->descricao;
			$tarefas->prioridade = $request->prioridade;
			$tarefas->responsavel = $request->responsavel;
			$tarefas->concluida = $request->concluida;
			$tarefas->user_id = Auth::user()->id;
			$tarefas->save();
			return redirect()->back()->with('message', 'Sua tarefa foi cadastrada com sucesso!');
		}
	}

	public function deletaTarefa(Request $request, $id){
		$tarefa = Tarefas::where('id',$id)->delete();
		return redirect()->back()->with('message', 'Sua tarefa foi deletada com sucesso!');
	}

	public function editarTarefa(Request $request,$id){

		$tarefa = Tarefas::find($id);

		$v = Validator::make($request->all(), [
			'titulo' => 'required',
		]);

		if ($v->fails()){
			return redirect()->back()->with('error', 'O campo titulo é obrigatório');
		}else{
			try {
				$tarefa->titulo = $request->titulo;
				$tarefa->descricao = $request->descricao;
				$tarefa->prioridade = $request->prioridade;
				$tarefa->responsavel = $request->responsavel;
				$tarefa->concluida = $request->concluida;
				$tarefa->save();
			} catch (Exception $e) {
				return redirect()->back()->with('error', 'Não foi possível alterar sua tarefa');
			}
			return redirect()->back()->with('message', 'Tarefa editada com sucesso.');
			return redirect()->back()->with('message', 'Sua tarefa foi cadastrada com sucesso!');
		}
	}

	public function concluirTarefa(Request $request, $id)
	{
        // dd($request->all(),$id);
		$tarefa = Tarefas::find($id);

		$tarefa->concluida = ($tarefa->concluida == 1) ? 0 : 1;
		$tarefa->save();
		if($tarefa->concluida == 0){
			return redirect()->back()->with('error', 'Tarefa marcada como NÃO concluída');
		}else{
			return redirect()->back()->with('message', 'Tarefa marcada como concluida');
		}


	}

	public function listarTarefas(){
		$tarefas = Tarefas::where('user_id','=',Auth::user()->id)->get();
		$data = [
            'tarefas'  => $tarefas
        ];

        return view('home',$data);
	}

}
