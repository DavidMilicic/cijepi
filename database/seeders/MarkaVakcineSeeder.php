<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkaVakcineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('marka_vakcine')->insert([
                'marka' =>('Pfizer')
            ]);
            DB::table('marka_vakcine')->insert([
                'marka' =>('Moderna')
            ]);
            DB::table('marka_vakcine')->insert([
                'marka' =>('AstraZeneca')
            ]);
    }
}
