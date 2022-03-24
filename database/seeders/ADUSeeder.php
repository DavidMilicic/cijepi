<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ADUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin1234')]
        );
        User::create(
            ['name' => 'Doktor', 'email' => 'doktor@gmail.com', 'password' => bcrypt('doktor1234')]
        );
        User::create(
            ['name' => 'User1234', 'email' => 'user1234@gmail.com', 'password' => bcrypt('user1234')]
        );
    }
}
