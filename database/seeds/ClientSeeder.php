<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            ['MARIA AGUILAR JARA','103937173','AV. INDEPENDENCIA NO. 241'],
            ['MANUEL AGUILAR LOJA','104619069','AV. INDEPENDENCIA NO. 779'],
            ['MARIA AGUIRRE MORA','102309796','AV. 20 DE NOVIEMBRE NO.1024'],
            ['JOSE AGUIRRE MOSQUERA','104121736','CARRETERA A LOMA ALTA S/N.'],
            ['LEONCIO AGUIRRE OCHOA','105774848','AV. 20 DE NOVIEMBRE NO. 1060'],                
        ];

        $i=0;
        foreach ($clientes as $key => $cliente) {
            $i++;
            Client::create([
                'name'=>$cliente[0],
                'phone'=>$cliente[1],
                'address'=>$cliente[2],
                'company_id' => 1,
                'commune_id' => $i,
            ]);
        }
    }
}
