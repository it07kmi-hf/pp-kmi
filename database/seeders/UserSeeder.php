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
            'email' => 'admin@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Pembahanan',
            'email' => 'pembahanan@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'pembahanan',
        ]);

        User::create([
            'name' => 'User Machinning',
            'email' => 'machinning@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'machinning',
        ]);

        User::create([
            'name' => 'User Asemmbling',
            'email' => 'asemmbling@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'asemmbling',
        ]);

        User::create([
            'name' => 'User Finishing',
            'email' => 'finishing@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'finishing',
        ]);

        User::create([
            'name' => 'User Packing',
            'email' => 'packing@kayumebel.com',
            'password' => Hash::make('123admin'),
            'role' => 'packing',
        ]);
    }
}
