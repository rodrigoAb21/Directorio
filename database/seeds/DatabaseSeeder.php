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
        for ($i = 0; $i < 10; $i++){
            factory(\App\Modelos\Empresa::class,10000)->create();
            factory(\App\Modelos\Ubicacion::class,30000)->create();
        }
    }
}
