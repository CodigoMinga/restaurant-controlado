<?php

use Illuminate\Database\Seeder;
use App\Delivery;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery::create(['ammount'=>1500,'delivery_commission'=>500,'company_id'=>2]);
        Delivery::create(['ammount'=>2000,'delivery_commission'=>650,'company_id'=>2]);
        Delivery::create(['ammount'=>2300,'delivery_commission'=>800,'company_id'=>2]);
        Delivery::create(['ammount'=>2500,'delivery_commission'=>850,'company_id'=>2]);
    }
}
