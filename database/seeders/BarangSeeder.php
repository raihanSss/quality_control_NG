<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            'nobarang' => '17',
            'name' => 'Korek',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 2,
            'kuantitas' => '100'
        ]);

        DB::table('barang')->insert([
            'nobarang' => 'mj-001',
            'name' => 'Meja',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 1,
            'kuantitas' => '110'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'ap-2323',
            'name' => 'apakek',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 1,
            'kuantitas' => '112'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'Pm-987',
            'name' => 'parfum',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 2,
            'kuantitas' => '110'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'SSR-953',
            'name' => 'sisir',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 3,
            'kuantitas' => '110'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'Knc233',
            'name' => 'kunci',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 1,
            'kuantitas' => '110'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'Br-765',
            'name' => 'bracket',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 1,
            'kuantitas' => '110'
        ]);
        DB::table('barang')->insert([
            'nobarang' => 'Clip-22',
            'name' => 'clip',
            'tanggal' => date('d-m-Y'),
            'mesin_id' => 3,
            'kuantitas' => '110'
        ]);
    }
}
