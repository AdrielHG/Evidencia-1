<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Example of seeding an admin user
        User::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'email' => 'user@example.com',
            'role_id' => Role::where('name', 'Sales')->first()->id, // Assign to 'Sales' role
        ]);
    }
}
