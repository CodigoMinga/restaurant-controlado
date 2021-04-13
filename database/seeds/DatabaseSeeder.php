<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(ProducttypeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(OrdertypeSeeder::class);
        $this->call(TabletypeSeeder::class);
        $this->call(TableSeeder::class);

        $this->call(OrderSeeder::class);
        $this->call(MeasureunitSeeder::class);
        $this->call(ItemSeeder::class);

        $this->call(RegionSeeder::class);
        $this->call(CommuneSeeder::class);
    }
}
