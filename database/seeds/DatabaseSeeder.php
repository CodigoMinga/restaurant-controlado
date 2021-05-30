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
        //BASES
        $this->call(MeasureunitSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CommuneSeeder::class);
        $this->call(OrdertypeSeeder::class);
        $this->call(TabletypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(DiscountSeeder::class);

        //POR TENNAT
        $this->call(CompanySeeder::class);
        $this->call(ProducttypeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TableSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ClientSeeder::class);
    }
}
