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
        Measureunit::create(['name'=>'gr','description'=>'Gramo']);
        Measureunit::create(['name'=>'Kg','description'=>'Kilogramo']);
        Measureunit::create(['name'=>'L','description'=>'Litro']);
        Measureunit::create(['name'=>'Und','description'=>'Unidad']);
        Measureunit::create(['name'=>'ml','description'=>'Mililitro']);
    }
}
