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
        Delivery::create(['ammount'=>	1500	]);
        Delivery::create(['ammount'=>	2000	]);
        Delivery::create(['ammount'=>	2300	]);
        Delivery::create(['ammount'=>	2500	]);
        Delivery::create(['ammount'=>	3000	]);
        Delivery::create(['ammount'=>	3500	]);
    }
}
