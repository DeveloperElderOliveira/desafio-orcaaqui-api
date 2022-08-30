<?php

namespace Database\Seeders;

use App\Models\Category;
use \App\Models\Entity;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Entity::insert([
        [
            'nome' => 'Comprador',
            'descricao' => 'Entidade tipo comprador.'
        ],
        [
            'nome' => 'Fornecedor',
            'descricao' => 'Entidade tipo fornecedor.'
        ]
        ]);

        Unit::insert([
        [
            'nome' => 'cx',
            'descricao' => 'caixa'
        ],
        [
            'nome' => 'und',
            'descricao' => 'unidade'
        ]
        ]);

        Category::insert([
        [
            'nome' => 'Elétricos',
            'descricao' => 'Materiais elétricos'
        ],
        [
            'nome' => 'Hidráulicos',
            'descricao' => 'Materiais hidráulicos'
        ]
        ]);

        User::insert([
        [
            'name' => 'comprador',
            'password' => '$2y$10$EsXEvZeVih5mN.H9A3/frO/t4uEuaTqCJvF7m9pQVoYf1gy.TVOCK',
            'entity_id' => 1
        ],
        [
            'name' => 'fornecedor',
            'password' => '$2y$10$EsXEvZeVih5mN.H9A3/frO/t4uEuaTqCJvF7m9pQVoYf1gy.TVOCK',
            'entity_id' => 2
        ]
        ]);

    }
}
