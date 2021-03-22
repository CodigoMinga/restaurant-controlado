<?php

use Illuminate\Database\Seeder;
use App\Measureunit;

class MeasureunitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Measureunit::create(['name'=>'Gramos']);
        Measureunit::create(['name'=>'Kilogramo']);
        Measureunit::create(['name'=>'Litros']);
        Measureunit::create(['name'=>'Unidad']);
        Measureunit::create(['name'=>'Mililitros']);
    }
}
