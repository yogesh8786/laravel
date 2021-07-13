<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        $users = [
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345678'),
                'verified' => 1,
                'active' => 1,
            ],
            [
                'role_id' => 2,
                'name' => 'User',
                'email' => 'user@yopmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345678'),
                'verified' => 1,
                'active' => 1,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }

        Schema::enableForeignKeyConstraints();
    }
}
