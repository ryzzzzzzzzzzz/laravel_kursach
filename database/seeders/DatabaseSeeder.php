<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $moderatorRole = Role::where('name', 'moderator')->first();

        User::updateOrCreate(
            [
                'email' => 'moderator@example.com',
            ],
            [
                'name' => 'Moderator',
                'password' => Hash::make('password123'),
                'role_id' => $moderatorRole->id,
            ]
        );
    }
}