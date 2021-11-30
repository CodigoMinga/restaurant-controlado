<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin  = Role::where('name', 'superadmin')->first();
        $companyadmin  = Role::where('name', 'companyadmin')->first();
        $normaluser  = Role::where('name', 'normaluser')->first();
        
        $codigominga    = Company::where('id',1)->first();
        $delixius       = Company::where('id',2)->first();
        $tiocheo        = Company::where('id',3)->first();

        $user = new User;
        $user->name = 'Osvaldo';
        $user->email = 'osvaldo.alvarado.dev@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $user->roles()->attach($superadmin);
        $user->companies()->attach($codigominga);
        $user->companies()->attach($delixius);
        $user->companies()->attach($tiocheo);

        $user = new User;
        $user->name = 'programador';
        $user->email = 'programador@microbesolutions.cl';
        $user->password = bcrypt('000000');
        $user->save();
        $user->roles()->attach($superadmin);
        $user->companies()->attach($codigominga);
        $user->companies()->attach($delixius);
        $user->companies()->attach($tiocheo);

        $user = new User;
        $user->name = 'Suki';
        $user->email = 'perronegro.cl@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($superadmin);
        $user->companies()->attach($codigominga);

        $user = new User;
        $user->name = 'Issa Daruich';
        $user->email = 'issadaruich@gmail.com';
        $user->password = bcrypt('clave123');
        $user->save();
        $user->roles()->attach($companyadmin);
        $user->companies()->attach($delixius);

        $user = new User;
        $user->name = 'Javiera';
        $user->email = 'Javiera@restorant.cl';
        $user->password = bcrypt('clave123');
        $user->save();
        $user->roles()->attach($superadmin);
        $user->companies()->attach($delixius);
    }
}
