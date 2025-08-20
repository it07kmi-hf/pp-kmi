<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User Admin',
            'email' => 'admin@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Pembahanan',
            'email' => 'pembahanan@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'pembahanan',
        ]);

        User::create([
            'name' => 'User Machinning',
            'email' => 'machinning@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'machinning',
        ]);

        User::create([
            'name' => 'User Assembling',
            'email' => 'assembling@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'assembling',
        ]);

        User::create([
            'name' => 'User Finishing',
            'email' => 'finishing@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'finishing',
        ]);

        User::create([
            'name' => 'User Packing',
            'email' => 'packing@kmi.com',
            'password' => Hash::make('123admin'),
            'role' => 'packing',
        ]);
    }
}
