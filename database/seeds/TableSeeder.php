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
        Table::create(['name'=>'Mesa 1','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Whatsapp 1','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 2','company_id'=>1,'tabletype_id'=>2]);
        Table::create(['name'=>'Facebook 1','company_id'=>1,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 2','company_id'=>1,'tabletype_id'=>3]);
        Table::create(['name'=>'Instagram 1','company_id'=>1,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 2','company_id'=>1,'tabletype_id'=>4]);
        Table::create(['name'=>'Teléfono 1','company_id'=>1,'tabletype_id'=>5]);
        Table::create(['name'=>'Teléfono 2','company_id'=>1,'tabletype_id'=>5]);

        /*Delixius*/
        Table::create(['name'=>'Mesa 1','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Whatsapp 1','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 2','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Facebook 1','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 2','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Instagram 1','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 2','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Teléfono 1','company_id'=>2,'tabletype_id'=>5]);
        Table::create(['name'=>'Teléfono 2','company_id'=>2,'tabletype_id'=>5]);

        /*TioCheo*/
        Table::create(['name'=>'Mesa 1','company_id'=>3,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>3,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>3,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>3,'tabletype_id'=>1]);
        Table::create(['name'=>'Whatsapp 1','company_id'=>3,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 2','company_id'=>3,'tabletype_id'=>2]);
        Table::create(['name'=>'Facebook 1','company_id'=>3,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 2','company_id'=>3,'tabletype_id'=>3]);
        Table::create(['name'=>'Instagram 1','company_id'=>3,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 2','company_id'=>3,'tabletype_id'=>4]);
        Table::create(['name'=>'Teléfono 1','company_id'=>3,'tabletype_id'=>5]);
        Table::create(['name'=>'Teléfono 2','company_id'=>3,'tabletype_id'=>5]);
    }
}
