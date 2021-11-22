<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Dmitrii',
                'email' => 'Dmitriiii@mail.ru',
                'password' => Hash::make('1234567qw')
            ],
            [
                'name' => 'Alexa',
                'email' => 'Alexasa@gmail.com',
                'password' => Hash::make('123')
            ]
        ];

        DB::table('admins')->insert($admins);
    }
}
