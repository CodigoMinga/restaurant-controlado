<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        $user = new User;
        $user->name = 'Osvaldo';
        $user->email = 'osvaldo.alvarado.dev@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);


        $user = new User;
        $user->name = 'Nikotine';
        $user->email = 'Nikotine991@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);

        $user = new User;
        $user->name = 'programador';
        $user->email = 'programador@microbesolutions.cl';
        $user->password = bcrypt('000000');
        $user->save();
        $user->roles()->attach($roles);

        $user = new User;
        $user->name = 'Sebastian';
        $user->email = 'shebin_bkn_92@hotmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);

        $user = new User;
        $user->name = 'Suki';
        $user->email = 'perronegro.cl@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);

    }
}
