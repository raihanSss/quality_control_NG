<?php

namespace Database\Seeders;

use App\Models\KeteranganNg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganNgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keterangan = [
            [
                'keterangan' => 'brudul'
            ],

            [
                'keterangan' => 'terawang'
            ],

            [
                'keterangan' => 'kaku'
            ],

            [
                'keterangan' => 'sobek'
            ],

            [
                'keterangan' => 'minus_dimensi'
            ],

            [
                'keterangan' => 'belah'
            ],

            [
                'keterangan' => 'dobeltiplepas'
            ],

        ];
        foreach($keterangan as $key => $value){
            KeteranganNg::create($value);
        }
    }
}
