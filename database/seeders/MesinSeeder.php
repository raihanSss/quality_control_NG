<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mesin')->insert([
            'name' => 'Mesin 1',
            'nomesin' => 'MSN-01',
        ]);

        DB::table('mesin')->insert([
            'name' => 'Mesin 2',
            'nomesin' => 'MSN-02',
        ]);

        DB::table('mesin')->insert([
            'name' => 'Mesin 3',
            'nomesin' => 'MSN-03',
        ]);

        
    }
}
