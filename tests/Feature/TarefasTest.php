<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TarefasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_usuario_ver_home_com_lista_de_tarefas()
    {
        $user = User::factory()->create();
        $url = route('login');
        $values = [
            'email' => $user->email,
            'password' => 'password'
        ];
        $this->post($url, $values);
        $this->assertAuthenticated();
        
        $response = $this->get('/home');
        $response->assertStatus(200);

    }

    public function test_nao_criar_tarefa_sem_usuario_logado(){

        $response = $this->post('novaTarefa', [
            'titulo' => 'Tarefa Teste',
            'descricao' => 'Tarefa criada a partir de teste unitário',
            'prioridade' => 'Alta',
            'responsavel' => 'PHPUnit',
            'concluida' => '0'
        ]);

        $response->assertStatus(500);
    }
}
