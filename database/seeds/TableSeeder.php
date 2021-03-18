<?php

use Illuminate\Database\Seeder;
use App\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::create(['name'=>'Entrega a domicilio','company_id'=>1,'ordertype_id' => 2]);
        Table::create(['name'=>'Retiro en Local','company_id'=>1,'ordertype_id' => 3]);
        Table::create(['name'=>'Mesa 3','company_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>1]);
        Table::create(['name'=>'Mesa 5','company_id'=>1]);
        Table::create(['name'=>'Mesa 6','company_id'=>1]);
    }
}
