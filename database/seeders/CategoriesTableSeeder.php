<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => "Agregate de Balastiera", "slug" => 'agb', 'domain_id' => '1', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Materiale Neprelucrate", "slug" => 'matn', 'domain_id' => '1', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_con', 'domain_id' => '1', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Lactate", "slug" => 'lac', 'domain_id' => '2', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Fructe", "slug" => 'fct', 'domain_id' => '2', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_alm', 'domain_id' => '2', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
        ]);
    }
}
