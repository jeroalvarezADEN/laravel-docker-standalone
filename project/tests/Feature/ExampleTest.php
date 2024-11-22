<?php

namespace Tests\Feature;
use App\Models\Customer;
use App\Models\Device;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    /**
     * Customer can have multiple devices.
     */
    public function test_customer_can_have_mutiple_devices(): void
    {
        $customer = Customer::create([
            'name' => 'Pepe Juan',
            'address' => 'Av simpre viva',
            'level' => 3,
        ]);
        for ($i=0; $i < 2; $i++) { 
            Device::factory()->create(['customer_id' => $customer->id]);
        }
        $this->assertGreaterThanOrEqual(2, $customer->devices->count());
    }

    /**
     * Customer can have´t devices.
     */
    public function test_customer_can_havent_devices(): void
    {
        $customer = Customer::create([
            'name' => 'Pepe Juan',
            'address' => 'Av simpre viva',
            'level' => 3,
        ]);
        $this->assertCount(0, $customer->devices);
    }
}
