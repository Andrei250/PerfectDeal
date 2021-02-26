<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'quantity' => $this->faker->numberBetween(100000, 30000000),
            'expire_date' => now(),
            'status' => 'Available',
            'min_quantity' => $this->faker->numberBetween(0, 100000),
            'user_id' => User::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'img_path' => 'uploads/orders/default_order.png'
        ];
    }
}
