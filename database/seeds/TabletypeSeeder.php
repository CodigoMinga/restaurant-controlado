<?php

use Illuminate\Database\Seeder;
use App\Tabletype;

class TabletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tabletype::create(['name'=>'Mesas']);
        Tabletype::create(['name'=>'Internet']);
    }
}
