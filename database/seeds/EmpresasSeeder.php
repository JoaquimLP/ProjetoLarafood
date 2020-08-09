<?php

use App\Models\{
    Plano,
    Empresa
};
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plano = Plano::first();

        $plano->empresas()->create([
            'cnpj' => '20413362000111',
            'nome' => 'Jorge e Cláudio Pizzaria ME',
            'url' => 'jorge-e-cláudio-pizzaria-me',
            'email' => 'diretoria@jorgeeclaudiopizzariame.com.br',
        ]);
    }
}
