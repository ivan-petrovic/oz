<?php

use Illuminate\Database\Seeder;

class FirmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Firma::class, 3)->create();
    }
}
