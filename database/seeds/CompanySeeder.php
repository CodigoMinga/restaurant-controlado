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
            'rut'=>'76795561-8',
            'razon_social'=>'HAULMER SPA',
            'giro' => 'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET; COMERCIO ELEC',
            'direccion' => 'ARTURO PRAT 527   CURICO',
            'comuna' => 'Curicó',
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
