<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Domain;
use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(50)->create();

        $orders = Order::all();

        foreach($orders as $order) {
            $domain_id = rand(1, 2);
            $category_id = Category::where(['domain_id' => $domain_id])->get()->random()->id;
            $subcategory_id = SubCategory::where(['category_id' => $category_id])->get()->random()->id;

            $order->domains()->attach($domain_id);
            $order->categories()->attach($category_id);
            $order->subcategories()->attach($subcategory_id);

        }
    }
}
