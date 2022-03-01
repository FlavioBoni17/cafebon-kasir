<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'no_telp' => '085221932799',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(60),
        ]);
    }
}
