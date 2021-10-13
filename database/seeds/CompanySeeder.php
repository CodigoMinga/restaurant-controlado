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
            'comuna' => 'curico',
            'commune_id' => 120,
            'api_key_openfactura' => '928e15a2d14d4a6292345f04960f4bd3'
        ]);

        Company::create(['name'=>'Delixius',
            'rut'=>'77.324.712-9',
            'razon_social'=>'Delixius_sushi_oficial',
            'giro' => 'Restaurant',
            'direccion' => 'Av. San Martín 357, Quilicura',
            'comuna' => 'Quilicura',
            'commune_id' => 120,
            'api_key_openfactura' => '928e15a2d14d4a6292345f04960f4bd3'
        ]);

        Company::create(['name'=>'Tio Cheo',
            'rut'=>'76795561-8',
            'razon_social'=>'HAULMER SPA',
            'giro' => 'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET; COMERCIO ELEC',
            'direccion' => 'ARTURO PRAT 527   CURICO',
            'comuna' => 'Quellon',
            'commune_id' => 303,
            'api_key_openfactura' => '928e15a2d14d4a6292345f04960f4bd3'
        ]);
    }
}
