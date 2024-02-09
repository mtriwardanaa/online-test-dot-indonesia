<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('oauth_clients')->delete();
        DB::table('oauth_clients')->insert([
            [
                'id'                     => 1,
                'user_id'                => null,
                'name'                   => 'Laravel Personal Access Client',
                'secret'                 => 'GYpnqMiDzPsW2Dl2KIv7njEjICpVs925GQ0J8LMS',
                'provider'               => null,
                'redirect'               => 'http://localhost',
                'personal_access_client' => 1,
                'password_client'        => 0,
                'revoked'                => 0,
                'created_at'             => date('Y-m-d H:i:s'),
                'updated_at'             => date('Y-m-d H:i:s'),
            ],
            [
                'id'                     => 2,
                'user_id'                => null,
                'name'                   => 'Laravel Password Grant Client',
                'secret'                 => 'dok9usH6TE1nJyJaiSnH8wPvfARa0ty42b0JSgUD',
                'provider'               => 'users',
                'redirect'               => 'http://localhost',
                'personal_access_client' => 0,
                'password_client'        => 1,
                'revoked'                => 0,
                'created_at'             => date('Y-m-d H:i:s'),
                'updated_at'             => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
