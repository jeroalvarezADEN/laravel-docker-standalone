<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;

class ListCustomersWithDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all customers with their devices';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Customer::with('devices')->get() as $customer) {
            $this->info("Nombre: {$customer->name}");
            $this->info("  Dispositivos:");
            if ($customer->devices->isEmpty()) {
                $this->line("   No tiene dispositivos");
            } else {
                $count = 1;
                foreach ($customer->devices as $device) {
                    $this->line("   {$count}. {$device->name}");
                    $count++;
                }
            }
            $this->newLine();
        }
        
    }
}
