<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = DB::table('roles')->where('slug', '=', 'guest')->first();

        if (!is_null($id)) {
            $id = $id->id;
        }

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'user_role' => $id,
            'caen_code' => $this->faker->word,
            'phone' => $this->faker->unique()->phoneNumber,
            'cif' => $this->faker->unique()->word,
            'com_register' => $this->faker->unique()->word,
        ];
    }
}
