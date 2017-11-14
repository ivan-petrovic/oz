<?php

use Faker\Generator as Faker;

$factory->define(App\Firma::class, function (Faker $faker) {
    return [
      'naziv' => $faker->company,
      'adresa' => $faker->streetAddress,
      'mesto' => $faker->city,
      'telefon' => $faker->numerify('###/####-###'),
      'tip' => $faker->numberBetween($min = 1, $max = 5),
      'status' => 'Aktivan',
      'matbr' => $faker->numerify('#############'),
      'pib' => $faker->numerify('#########'),
      'sifdel' => $faker->numerify('####'),
      'ziro_racun' => $faker->numerify('###-######-###'),
      'naziv_banke' => $faker->company
    ];
});
