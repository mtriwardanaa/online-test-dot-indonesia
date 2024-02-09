<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['id' => 1], [
            'id'                => 1,
            'name'              => 'admin',
            'email'             => 'admin@email.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password'          => Hash::make('password'),
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
