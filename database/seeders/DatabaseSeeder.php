<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // your seeders go here
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        User::factory(10)->create();
        Customer::factory(10)->create();
        Order::factory(10)->create();
    }
}
