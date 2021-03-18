<?php

use Illuminate\Database\Seeder;
use App\Ordertype;
class OrdertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ordertype::create(['name'=>'Consumo en local']);
        Ordertype::create(['name'=>'Entrega']);
        Ordertype::create(['name'=>'Retiro en local']);
    }
}
