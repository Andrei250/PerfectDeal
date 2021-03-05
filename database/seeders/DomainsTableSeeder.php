<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domains')->insert([
            ['name' => "Constructii", "slug" => 'cons', 'icon_path' => 'uploads/orders/default_order.png', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Alimentara", "slug" => 'alim', 'icon_path' => 'uploads/orders/default_order.png', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()]
        ]);
    }
}
