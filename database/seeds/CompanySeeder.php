<?php

use Illuminate\Database\Seeder;

use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create(['name'=>'CodigoMinga Bar',
            'rut'=>'77012555-3',
            'razon_social'=>'Colaborativa y Cooperativa Conectando',
            'giro' => 'Restaurant',
            'direccion' => 'Quellon S/N',
            'comuna' => 'Quellon',
            'api_key_openfactura' => '928e15a2d14d4a6292345f04960f4bd3'
        ]);
        Company::create(['name'=>'Delixius',
            'rut'=>'77012555-3',
            'razon_social'=>'DARUICHRODRIGUEZ SPA',
            'giro' => 'Restaurant',
            'direccion' => 'Santiago S/N',
            'comuna' => 'Santiago',
            'api_key_openfactura' => '928e15a2d14d4a6292345f04960f4bd3'
        ]);
    }
}
