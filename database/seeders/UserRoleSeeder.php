<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            DB::table('role_user')->insert([
                'role_id' => ($i),
                'user_id' => ($i),
                'user_type' => ('App\Models\User') #Ovo mora biti ovako da bi se mogao authenticateat user
            ]);
        }
        #drugi for za ostalih 10 random usera
        for ($i = 4; $i < 14; $i++) {
            DB::table('role_user')->insert([
                'role_id' => ('3'),
                'user_id' => ($i),
                'user_type' => ('App\Models\User') #Ovo mora biti ovako da bi se mogao authenticateat user
            ]);
        }
    }
}
