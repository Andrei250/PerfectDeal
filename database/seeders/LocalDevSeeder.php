<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocalDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DummyUsersTableSeeder::class);
        $this->call(DomainsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
