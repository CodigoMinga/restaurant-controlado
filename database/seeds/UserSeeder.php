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
        $roles  = Role::where('name', 'superadmin')->first();
        
        $codigominga    = Company::where('id',1)->first();
        $delixius       = Company::where('id',2)->first();
        $tiocheo        = Company::where('id',3)->first();

        $user = new User;
        $user->name = 'Osvaldo';
        $user->email = 'osvaldo.alvarado.dev@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);
        $user->companies()->attach($delixius);
        $user->companies()->attach($tiocheo);

        $user = new User;
        $user->name = 'programador';
        $user->email = 'programador@microbesolutions.cl';
        $user->password = bcrypt('000000');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);
        $user->companies()->attach($delixius);
        $user->companies()->attach($tiocheo);

        $user = new User;
        $user->name = 'Sebastian';
        $user->email = 'sebastian.vera.moll@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($delixius);

        $user = new User;
        $user->name = 'Suki';
        $user->email = 'perronegro.cl@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($delixius);

        $user = new User;
        $user->name = 'Nikotine';
        $user->email = 'Nikotine991@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);
    }
}
