<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => bcrypt('user1234')
            ],
            [
                'name' => 'User2',
                'email' => 'user2@email.com',
                'password' => bcrypt('user1234')
            ]
        ]);
    }
}
