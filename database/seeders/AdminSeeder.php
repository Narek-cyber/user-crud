<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'John',
                'email' => 'john@doe.com',
                'password' => Hash::make('12345678'),
                'address' => '123 Main St',
                'phone_number' => '1234567890',
            ],
            [
                'name' => 'Jenna',
                'email' => 'jenna@doe.com',
                'password' => Hash::make('12345678'),
                'address' => '456 Oak St',
                'phone_number' => '0987654321',
            ],
        ];

        foreach ($admins as $admin) {
            $user = User::query()->firstOrCreate(
                ['email' => $admin['email']],
                ['name' => $admin['name'], 'password' => $admin['password']]
            );

            $user->user_details()->firstOrCreate(
                ['user_id' => $user->id],
                [
                    'address' => $admin['address'],
                    'phone_number' => $admin['phone_number'],
                ]
            );
        }
    }
}
