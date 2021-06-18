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
        //DELIXUS
        Producttype::create(['name'=>'Entradas','company_id'=>2]);
        Producttype::create(['name'=>'Californias sesamo','company_id'=>2]);
        Producttype::create(['name'=>'Avocado Palta','company_id'=>2]);
        Producttype::create(['name'=>'Californias masago','company_id'=>2]);
        Producttype::create(['name'=>'California ciboulette','company_id'=>2]);
        Producttype::create(['name'=>'Veggie rolls','company_id'=>2]);
        Producttype::create(['name'=>'Cheese rolls','company_id'=>2]);
        Producttype::create(['name'=>'Panko','company_id'=>2]);
        Producttype::create(['name'=>'Avocado salmon','company_id'=>2]);
        Producttype::create(['name'=>'Gohan','company_id'=>2]);
        Producttype::create(['name'=>'Extras','company_id'=>2]);
        Producttype::create(['name'=>'Bebidas y jugos','company_id'=>2]);
        Producttype::create(['name'=>'Postres','company_id'=>2]);
        Producttype::create(['name'=>'Rolls Premium','company_id'=>2]);
        Producttype::create(['name'=>'Promociones','company_id'=>2]);
        Producttype::create(['name'=>'Pedidos Ya','company_id'=>2]);
        Producttype::create(['name'=>'Tragos','company_id'=>2]);
        Producttype::create(['name'=>'Handrolls','company_id'=>2]);
        Producttype::create(['name'=>'Agregar ingrediente','company_id'=>2]);

        /*Caregorias codigomingeras*/
        Producttype::create(['name'=>'Entradas','company_id'=>1]);
        Producttype::create(['name'=>'Californias sesamo','company_id'=>1]);
        Producttype::create(['name'=>'Avocado Palta','company_id'=>1]);
        Producttype::create(['name'=>'Californias masago','company_id'=>1]);
        Producttype::create(['name'=>'California ciboulette','company_id'=>1]);
        Producttype::create(['name'=>'Veggie rolls','company_id'=>1]);
        Producttype::create(['name'=>'Cheese rolls','company_id'=>1]);
        Producttype::create(['name'=>'Panko','company_id'=>1]);
        Producttype::create(['name'=>'Avocado salmon','company_id'=>1]);
        Producttype::create(['name'=>'Gohan','company_id'=>1]);
        Producttype::create(['name'=>'Extras','company_id'=>1]);
        Producttype::create(['name'=>'Bebidas y jugos','company_id'=>1]);
        Producttype::create(['name'=>'Postres','company_id'=>1]);
        Producttype::create(['name'=>'Rolls Premium','company_id'=>1]);
        Producttype::create(['name'=>'Promociones','company_id'=>1]);
        Producttype::create(['name'=>'Pedidos Ya','company_id'=>1]);
        Producttype::create(['name'=>'Tragos','company_id'=>1]);
        Producttype::create(['name'=>'Handrolls','company_id'=>1]);
        Producttype::create(['name'=>'Agregar ingrediente','company_id'=>1]);
    }
}
