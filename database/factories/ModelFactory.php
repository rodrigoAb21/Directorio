<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Modelos\Empresa::class, function (Faker\Generator $faker) {
    $claves = $faker->randomElements(array('productos','librerias','comida','computadoras', 'autos', 'mecanicos', 'software', 'programas', 'bancos', 'mariachis', 'cuadernos','utiles','hogar','hotel','hospedaje','lapiceros','celulares','audio'),mt_rand(3,5),false);

    $texto = "";
    foreach ($claves as $clave){
        $texto = $texto ." ". $clave;
    }

    return [
        'nombre'=> $faker->company,
        'descripcion' => $faker->paragraph(1),
        'logo' => $faker->randomElement(array("default_img.png", "logo1.png", "logo2.png")),
        'clave' => $texto,
        'email' => $faker -> freeEmail,
        'web' => $faker -> domainName,
        'rubro_id' => $faker ->numberBetween(1,24),
    ];
});

$factory->define(\App\Modelos\Ubicacion::class, function (Faker\Generator $faker){
    return [
        'nombre' => $faker->name,
        'direccion' => $faker->streetAddress,
        'telefono' => '3542121',
        'longitud' => $faker -> longitude($min = -68.3, $max = -60),
        'latitud' => $faker -> latitude($min = -20, $max = -13.2),
        'departamento' => 'Santa Cruz',
        'empresa_id' => $faker -> numberBetween(1,3000)
    ];
});

