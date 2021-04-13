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
        /*Codigo Minga*/
        Table::create(['name'=>'Facebook','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Instagram','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Teléfono','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Mesa 1','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>1,'tabletype_id'=>1]);

        /*Delixius*/

        Table::create(['name'=>'Facebook','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Instagram','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Teléfono','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Mesa 1','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>2,'tabletype_id'=>1]);
    }
}
