<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SolicitTest extends TestCase
{

    public function test_store_solicitacao_sem_token_retorna_nao_autenticado()
    {
        $response = $this->postJson('/api/solicit',[
            "produtos" => [
                    ["product_id"=>1,"quantidade"=>"1","unit_id"=>1],
                    ["product_id"=>1,"quantidade"=>"2","unit_id"=>2]
                ],
            "observacao"=>"teste",
            "status"=>1]);

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_store_solicitacao_com_token_retorna_cadastrado_com_sucesso()
    {
        $payload = [
            'name' => 'comprador',
            'password' => '123456' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);

        $response = $this->postJson('/api/solicit',[
            "produtos" => [
                    ["product_id"=>1,"quantidade"=>"1","unit_id"=>1],
                    ["product_id"=>1,"quantidade"=>"2","unit_id"=>2]
                ],
            "observacao"=>"Primeiro Orçamento do Mês.",
            "status"=>1]);

        $response->assertStatus(200)
        ->assertJsonStructure(['success']);
    }

    public function test_index_solicitacoes_sem_token_retorna_nao_autenticado()
    {
        $response = $this->getJson('/api/solicit');

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_index_solicitacoes_com_token_retorna_todas_solicitacoes()
    {
        $payload = [
            'name' => 'comprador',
            'password' => '123456' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);

        $response = $this->getJson('/api/solicit',[
            'Authorization' => "Bearer {$response_auth["access_token"]}",
        ]);     

        $response->assertStatus(200)
                    ->assertJsonStructure(['solicitacoes']);
    }
}
