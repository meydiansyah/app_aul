<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = [
            [
                'name' => 'Abdurrahman Grahadi Maulana',
                'level' => 'admin',
                'status_id' => 1,
                'phone' => '085767113554',
                'image' => '1627062326.png',
                'email' => 'grahadim178@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin',
                'level' => 'admin',
                'status_id' => 1,
                'image' => 'avatar.png',
                'email' => 'admin@test.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Abdurrahman GM',
                'level' => 'freelancer',
                'status_id' => 2,
                'image' => 'avatar.png',
                'email' => 'grahadim00@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Aul',
                'level' => 'freelancer',
                'status_id' => 2,
                'image' => 'avatar.png',
                'email' => 'aul@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Hadoy',
                'level' => 'client',
                'status_id' => 2,
                'phone' => '085767113554',
                'image' => 'avatar.png',
                'email' => 'grahadim232@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Aulia',
                'level' => 'client',
                'status_id' => 2,
                'phone' => '085767113554',
                'image' => 'avatar.png',
                'email' => 'aulia@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
        ];
        
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
