<?php

namespace Database\Seeders;

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Permissao::create([
            'nome' => "Empresas",
            'descricao' => "permissão acesso view Empresas",
            ]); */
        Permissao::create([
            'nome' => "Planos",
            'descricao' => "permissão acesso view Planos",
             ]);
        Permissao::create([
            'nome' => "Perfis",
            'descricao' => "permissão acesso view Perfis",
             ]);
         Permissao::create([
            'nome' => "Função",
            'descricao' => "permissão acesso view Função",
             ]);
        Permissao::create([
            'nome' => "Permissão",
            'descricao' => "permissão acesso view Permissão",
             ]);
        Permissao::create([
            'nome' => "Usuário",
            'descricao' => "permissão acesso view Usuário",
             ]);
        Permissao::create([
            'nome' => "Categoria",
            'descricao' => "permissão acesso view Categoria",
             ]);
        Permissao::create([
            'nome' => "Produtos",
            'descricao' => "permissão acesso view Produtos",
             ]);
        Permissao::create([
            'nome' => "Mesas",
            'descricao' => "permissão acesso view Mesas",
            ]);
    }
}
