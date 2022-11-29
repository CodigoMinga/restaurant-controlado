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
        Table::create(['name'=>'Mesa 01','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 02','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 03','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 04','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 05','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 06','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Whatsapp 01','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 02','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 03','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 04','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 05','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 06','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 07','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 08','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 09','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 10','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 11','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 12','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 13','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 14','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 15','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 16','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 17','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 18','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 19','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Whatsapp 20','company_id'=>2,'tabletype_id'=>2]);
        Table::create(['name'=>'Facebook 01','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 02','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 03','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 04','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 05','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 06','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 07','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 08','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 09','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Facebook 10','company_id'=>2,'tabletype_id'=>3]);
        Table::create(['name'=>'Instagram 01','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 02','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 03','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 04','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 04','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Instagram 06','company_id'=>2,'tabletype_id'=>4]);
        Table::create(['name'=>'Teléfono 01','company_id'=>2,'tabletype_id'=>5]);
        Table::create(['name'=>'Teléfono 02','company_id'=>2,'tabletype_id'=>5]);

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
