<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class); #ovo poziva seedere
        $this->call(BrojDozeSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(MarkaVakcineSeeder::class);
        $this->call(ADUSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
