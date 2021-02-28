<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            ['name' => "Balast", "slug" => 'bal', 'category_id' => '1', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_agb', 'category_id' => '1', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Lemn", "slug" => 'lem', 'category_id' => '2', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_matn', 'category_id' => '2', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_div_cons', 'category_id' => '3', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],

            ['name' => "Lapte", "slug" => 'lap', 'category_id' => '4', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_lact', 'category_id' => '4', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Mere", "slug" => 'mer', 'category_id' => '5', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_frc', 'category_id' => '5', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],
            ['name' => "Diverse", "slug" => 'div_div_alm', 'category_id' => '6', "created_at" => Carbon::now()->toDateTimeString(), "updated_at" => Carbon::now()->toDateTimeString()],

        ]);
    }
}
