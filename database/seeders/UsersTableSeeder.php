<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Driver User',
                'email' => 'driver@example.com',
                'password' => bcrypt('password'),
                'role' => 'driver',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Approver User 1',
                'email' => 'approver1@example.com',
                'password' => bcrypt('password'),
                'role' => 'approver',
            ],
            [
                'name' => 'Approver User 2',
                'email' => 'approver2@example.com',
                'password' => bcrypt('password'),
                'role' => 'approver',
            ],
        ]);
    }
}
