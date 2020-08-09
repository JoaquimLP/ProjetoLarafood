<?php

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = Empresa::first();

        $empresa->usuarios()->create([
            'name' => 'Joaquim Lopes',
            'empresa_id' => 1,
            'email' => 'joaquimlp2013@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
