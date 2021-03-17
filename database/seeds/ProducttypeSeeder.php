<?php

use Illuminate\Database\Seeder;
use App\Producttype;

class ProducttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producttype::create(['name'=>'California y Avocado','company_id'=>1]);
        Producttype::create(['name'=>'Hots Rolls','company_id'=>1]);
        Producttype::create(['name'=>'Chesse Rolls','company_id'=>1]);
        Producttype::create(['name'=>'Veggie Rolls','company_id'=>1]);
        Producttype::create(['name'=>'Hosomakis','company_id'=>1]);
        Producttype::create(['name'=>'Rolls Premium','company_id'=>1]);
        Producttype::create(['name'=>'Gohan','company_id'=>1]);
        Producttype::create(['name'=>'Para Comenzar','company_id'=>1]);
        Producttype::create(['name'=>'Postres Rolls','company_id'=>1]);
        Producttype::create(['name'=>'Bebidas','company_id'=>1]);
        Producttype::create(['name'=>'Promociones','company_id'=>1]);
    }
}
