<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => "admin",
            'email' => 'admin@a.com',
            "password" => Hash::make("password")
        ]);

        User::create([
            'name' => "Mg Mg",
            "email" => "mgmg@a.com",
            "password" => Hash::make("password"),
            "phone" => '09876789',
            "address" => "mgmg's address"
        ]);
    }
}
