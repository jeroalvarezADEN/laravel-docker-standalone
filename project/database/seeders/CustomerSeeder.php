<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::factory()->count(10)->create()->each(function ($customer) {
            $customer->devices()->saveMany(
                \App\Models\Device::factory()->count(rand(1, 2))->make()
            );
        });
    }
}