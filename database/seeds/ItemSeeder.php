<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Item::create(['name'=>'Agridulce','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Almendras','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Atún','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Camarón','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Carne','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Cebolla Morada','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Cebollín','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Champiñon','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Champiñón Furay','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Chirimoya','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Choclo Enano','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Ciboulette','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Fideos de Wantán','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Frutilla','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Gyosas','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Jaiba','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Kanikama','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Mango','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Maracuya','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Masago','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Palmito','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Palta','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Panko','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Pescado Apanado','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Pimentón','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Piña','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Pollo','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Pulpo','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Queso','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Queso Crema','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salmón','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salmon Ahumado','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salsa Acevichada','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salsa Maracuyá','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salsa Nikkei','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Salsa Spicy','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Sésamo','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Soyas','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Sprite','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Coca cola','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Coca Cola Zero','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
        Item::create(['name'=>'Fanta','stock'=>100,'measureunit_id'=>1,'company_id'=>1]);
    }
}
