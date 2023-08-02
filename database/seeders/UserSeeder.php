<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'divisi' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'email' => 'admin@gmail.com'
            ],

            [
                'name' => 'qc_staff 1',
                'divisi'=>'qa_staff',
                'username' => 'quality1',
                'password' => bcrypt('123456'),
                'email' => 'quality1@gmail.com'
            ],

            [
                'name' => 'qa_staff 2',
                'divisi'=>'qa_staff',
                'username' => 'quality2',
                'password' => bcrypt('123456'),
                'email' => 'quality2@gmail.com'
            ],

            [
                'name' => 'qc_leader',
                'divisi'=>'qa_leader',
                'username' => 'leader',
                'password' => bcrypt('leader123'),
                'email' => 'leader@gmail.com'
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
