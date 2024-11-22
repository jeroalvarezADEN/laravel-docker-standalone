<?php

namespace Database\Factories;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{

    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'level' => $this->faker->numberBetween(1, 5),
        ];
    }
}
