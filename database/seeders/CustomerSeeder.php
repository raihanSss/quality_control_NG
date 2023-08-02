<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = [
            [
                'nama_customer' => 'PT ADM',
                'alamat_customer' => 'Jln.jawaludin.112',
                'no_telp_customer' => '14045'
            ],

           
        ];

        foreach($customer as $key => $value){
            Customer::create($value);
        }
    }
}
