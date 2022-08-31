<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_store_produto_sem_token_retorna_nao_autenticado()
    {
        $response = $this->postJson('/api/product',[
            "descricao" => "Cabo Flexível Antichamas Flexsil",
            "preco" => 150.35,
            "category_id" => 1
        ]);

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_store_produto_com_token_retorna_cadastrado_com_sucesso()
    {
        $payload = [
            'name' => 'comprador',
            'password' => '123456' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);

        $response = $this->postJson('/api/product',[
            'Authorization' => "Bearer {$response_auth["access_token"]}",
            "descricao" => "Cabo Flexível Antichamas",
            "preco" => 150.35,
            "category_id" => 1
        ]);

        $response->assertStatus(200)
        ->assertJsonStructure(['success']);
    }

    public function test_index_produtos_sem_token_retorna_nao_autenticado()
    {
        $response = $this->getJson('/api/product');

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_index_produtos_com_token_retorna_todos_produtos()
    {
        $payload = [
            'name' => 'comprador',
            'password' => '123456' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);

        $response = $this->getJson('/api/product',[
            'Authorization' => "Bearer {$response_auth["access_token"]}",
        ]);     

        $response->assertStatus(200)
                    ->assertJsonStructure(['produtos']);
    }
}
