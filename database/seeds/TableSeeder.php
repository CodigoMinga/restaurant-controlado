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
        Table::create(['name'=>'Facebook','company_id'=>1,'tabletype_id'=>2,'image'=>'https://facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png']);
        Table::create(['name'=>'Whatsapp','company_id'=>1,'tabletype_id'=>2,'image'=>'https://www.institutocarlrogers.org/wp-content/uploads/2019/09/Whatsapp-Icon-PNG-Image-715x715.png']);
        Table::create(['name'=>'Instagram','company_id'=>1,'tabletype_id'=>2,'image'=>'https://facebookbrand.com/wp-content/uploads/2021/03/Instagram_AppIcon_Aug2017.png?w=300&h=300']);
        Table::create(['name'=>'Teléfono','company_id'=>1,'tabletype_id'=>2,'image'=>'https://images.vexels.com/media/users/3/205069/isolated/preview/f207045d96c258fed664305f0ac2c5bd-icono-de-auricular-de-tel-eacute-fono-azul-by-vexels.png']);
        Table::create(['name'=>'Mesa 1','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>1,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>1,'tabletype_id'=>1]);

        /*Delixius*/
        Table::create(['name'=>'Facebook','company_id'=>2,'tabletype_id'=>2,'image'=>'https://facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png']);
        Table::create(['name'=>'Whatsapp','company_id'=>2,'tabletype_id'=>2,'image'=>'https://www.institutocarlrogers.org/wp-content/uploads/2019/09/Whatsapp-Icon-PNG-Image-715x715.png']);
        Table::create(['name'=>'Instagram','company_id'=>2,'tabletype_id'=>2,'image'=>'https://facebookbrand.com/wp-content/uploads/2021/03/Instagram_AppIcon_Aug2017.png?w=300&h=300']);
        Table::create(['name'=>'Teléfono','company_id'=>2,'tabletype_id'=>2,'image'=>'https://images.vexels.com/media/users/3/205069/isolated/preview/f207045d96c258fed664305f0ac2c5bd-icono-de-auricular-de-tel-eacute-fono-azul-by-vexels.png']);
        Table::create(['name'=>'Mesa 1','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 2','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 3','company_id'=>2,'tabletype_id'=>1]);
        Table::create(['name'=>'Mesa 4','company_id'=>2,'tabletype_id'=>1]);
    }
}
