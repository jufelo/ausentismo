<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
            'name' => 'PHP-Laravel',
            'email' => 'ad@ad.com',
            'status' => '1',
            'password' => bcrypt('123')
        ])->assignRole('Admin');
    }
}
