<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'mmadmin',
            'email' => 'mmadmin@abtechminds.com',
            'password' => Hash::make('mmadmin123'),
        ]);
        User::create([
            'name' => 'mmsuperadmin',
            'email' => 'mmsuperadmin@abtechminds.com',
            'password' => Hash::make('mmsuperadmin123'),
        ]);
        User::create([
            'name' => 'demouser',
            'email' => 'mmdemouser@abtechminds.com',
            'role'=>'user',
            'password' => Hash::make('mmdemouser123'),
        ]);
    }
}
