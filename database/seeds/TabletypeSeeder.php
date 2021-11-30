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
        Tabletype::create(['name'=>'Local']);
        Tabletype::create(['name'=>'Whatsapp']);
        Tabletype::create(['name'=>'Facebook']);
        Tabletype::create(['name'=>'Instagram']);
        Tabletype::create(['name'=>'Otros']);
    }
}
