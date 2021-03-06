<?php

use Database\Seeders\PermissaoSeeder;
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
        $this->call([
                PlanosSeeder::class,
                EmpresasSeeder::class,
                UsersTableSeeder::class,
                PermissaoSeeder::class
            ]);
    }
}
