<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modelos\Empresa::class,100)->create();
        factory(\App\Modelos\Ubicacion::class,800)->create();
    }
}
