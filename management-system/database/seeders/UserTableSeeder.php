<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // password
            'status' => '1',
        ],
        [
            'name' => 'Instructor',
            'username' => 'instructor',
            'email' => 'instructor@example.com',
            'password' => bcrypt('password'), // password
            'status' => '1',
        ],
        [
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('password'), // password
            'status' => '1',
        ]]
        );
    }
}
