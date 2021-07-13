<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        $roles = [
            ['name' => 'admin', 'display_name' => 'Admin'],
            ['name' => 'user', 'display_name' => 'User'],

        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        Schema::enableForeignKeyConstraints();
    }
}
