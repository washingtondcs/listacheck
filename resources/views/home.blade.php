@extends('layouts.app')
@section('content')
<div class="container alturafull">
    <!-- Botões, adicionar, imprimir e status -->
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header d-print-none">
                <h1>Tarefas</h1>
                <p>Gerenciamento de tarefas</p>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif 

            <div class="page-header d-none d-print-block">
                <h1>Relatorio de tarefas cadastradas</h1>
                <p>Versao de impressao</p>
            </div>

            <div class="btn-group hidden-print" role="group" aria-label="..." style="margin-bottom: 30px">

                <a title="Adicionar novo registro" href="#" data-toggle="modal"
                data-target="#novaTarefa" class="btn btn-primary btn-sm"> Adicionar</a> 

                <a title="Imprimir relatorio" href="#" class="btn btn-outline-dark btn-sm" onClick="return print()">Imprimir</a>

                <button title="Visualizar status geral das tarefas" type="button"
                class="btn btn-outline-dark btn-sm" data-toggle="modal"
                data-target="#grafico">
                Status
            </button>
        </div>
    </div>
</div>
<!-- FIM Botões, adicionar, imprimir e status -->

<!-- Tabela de tarefas -->
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Responsável</th>
                    <th>Concluída?</th>
                    <th class="hidden-print text-center">Ações</th>
                </tr>
            </thead> 

            <tbody>

                @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{$tarefa->id}}</td>
                    <td>{{$tarefa->titulo}}</td>
                    <td>{{$tarefa->prioridade}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>{{$tarefa->responsavel}}</td>

                    @if($tarefa->concluida == 0)
                    <td>NÃO</td>
                    @else
                    <td>SIM</td>
                    @endif
                    <td>
                        <a href="#" data-toggle="modal" data-target="#tarefaDelete{{$tarefa->id}}" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#editarTarefa{{$tarefa->id}}" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="/concluirTarefa/{{$tarefa->id}}" class="btn btn-outline-dark btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                    </td>

                    <!--- Deletar modal -->
                    <div class="modal fade" id="tarefaDelete{{$tarefa->id}}" role="dialog" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Deletar tarefa?</h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden>&times;</span><span class="sr-only">Fechar</span>
                                    </button>
                                </div>

                                <div class="modal-body text-left">
                                    <strong>ID:</strong> <span> {{$tarefa->titulo}}</span><br>
                                    <strong>Titulo:</strong> <span> {{$tarefa->titulo}}</span><br>
                                    <strong>Responsável: </strong><span> {{$tarefa->titulo}}</span>
                                </div>

                                <div class="modal-footer">
                                    <a href="/deletaTarefa/{{$tarefa->id}}" class="btn btn-success">Confirmar</a>
                                    <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Cancelar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--- fim deletar modal -->

                    <!--- Modal editar tarefa -->
                    <div class="modal fade" id="editarTarefa{{$tarefa->id}}" role="dialog" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal header">

                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden>&times;</span><span class="sr-only">Fechar</span>
                                    </button>

                                    <h4 class="modal-title">Nova tarefa</h4>
                                </div>

                                <div class="modal-body">
                                    <form role="form" data-toggle="validator" action="/editarTarefa/{{$tarefa->id}}" method="get">
                                        {{csrf_field()}}
                                        <div class="form-group"> 
                                            <label style="padding-top: 20px;">Titulo</label> <input class="form-control" type="text" name="titulo" value="{{$tarefa->titulo}}"> <hr>

                                            <label>Descricao</label>
                                            <textarea class="form-control" rows="8" cols="1" name="descricao">{{$tarefa->descricao}}</textarea><hr>

                                            <label>Prioridade</label>
                                            <select class="form-control"
                                            name="prioridade">
                                            <option value="{{$tarefa->prioridade}}">{{$tarefa->prioridade}}</option>
                                            <option value="Alta">Alta</option>
                                            <option value="Baixa">Baixa</option>
                                            <option value="Media">Media</option>
                                            <option value="Indiferente">Indiferente</option>
                                        </select> <hr>

                                        <label>Responsavel</label> <input class="form-control"
                                        type="text" name="responsavel" value="{{$tarefa->responsavel}}">

                                        <input type="hidden" name="concluida" value="0"><br>

                                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                data-dismiss="modal">Fechar</button>

                            </div>

                        </div>
                    </div>
                </div>
                <!--- Fim modal editar tarefa -->

                @endforeach
            </tr>
        </tbody>


    </table>
    <!-- Fim tabela de tarefas -->

    <!--- janela modal -->
    <?php
    $QtTarefas = count($tarefas);
    $QtConcluidas = count($tConcluidas);
    $QtNaoConcluidas = count($tNaoConcluidas);
    if($QtConcluidas != 0 && $QtTarefas != 0){
       $percConcluidas = ($QtConcluidas * 100)/$QtTarefas; 
   }else{
    $percConcluidas=0;
}

if ($QtNaoConcluidas != 0 && $QtTarefas!=0) {
    $percNaoConcluidas = ($QtNaoConcluidas * 100)/$QtTarefas;
}else{
    $percNaoConcluidas=0;
}


?>
<div class="modal fade" id="grafico" role="dialog" tabindex="-1"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal header">

            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden>&times;</span><span class="sr-only">Fechar</span>
            </button>

            <h4 class="modal-title">Status</h4>
        </div>

        <div class="modal-body">
            <p>Status das tarefas no sistema</p>

            <!-- Informações janela modal -->
            <h3>(%) Tarefas concluidas</h3>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow=""
                aria-valuemin="0" aria-valuemax="100" style="width: {{$percConcluidas}}%;">{{$percConcluidas}}%</div>
            </div>
            <hr>
            <h3>(%) Tarefas nao concluidas</h3>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow=""
                aria-valuemin="0" aria-valuemax="100" style="width: {{$percNaoConcluidas}}%;">{{$percNaoConcluidas}}%</div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default"
            data-dismiss="modal">Fechar</button>

        </div>

    </div>
</div>
</div>
<!--- fim da janela modal -->

<!--- Modal nova tarefa -->
<div class="modal fade" id="novaTarefa" role="dialog" tabindex="-1"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal header">

            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden>&times;</span><span class="sr-only">Fechar</span>
            </button>

            <h4 class="modal-title">Nova tarefa</h4>
        </div>

        <div class="modal-body">
            <form role="form" data-toggle="validator" action="/novaTarefa" method="post">
                {{csrf_field()}}
                <div class="form-group"> 
                    <label style="padding-top: 20px;">Titulo</label> <input class="form-control" type="text" name="titulo"> <hr>

                    <label>Descricao</label>
                    <textarea class="form-control" rows="8" cols="1" name="descricao"></textarea><hr>

                    <label>Prioridade</label>
                    <select class="form-control"
                    name="prioridade">
                    <option value="Alta">Alta</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Media">Media</option>
                    <option value="Indiferente">Indiferente</option>
                </select> <hr>

                <label>Responsavel</label> <input class="form-control"
                type="text" name="responsavel">

                <input type="hidden" name="concluida" value="0"><br>

                <button type="submit" class="btn btn-success">Adicionar</button>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default"
        data-dismiss="modal">Fechar</button>

    </div>

</div>
</div>
</div>
<!--- Fim modal nova tarefa -->

</div>
</div>
</div>
@endsection
