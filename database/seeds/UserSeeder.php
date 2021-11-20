<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass1 = '123456789';
        $pass2 = 'qwerty12';
        $pass3 = 'abobasiski1';
        $pass4 = 'daiobaniirot2';
        $users = [

            [
                'name' => 'no_author',
                'email' => 'noauthor@gmail.com',
                'description' => Str::random(60),
                'password' => Hash::make($pass1)
            ],
            [
                'name' => 'AuthorOne',
                'email' => 'AuthorOne@gmail.com',
                'description' => Str::random(70),
                'password' => Hash::make($pass2)
            ],
            [
                'name' => 'Dmitrii',
                'email' => 'Dmitrii@gmail.com',
                'description' => Str::random(40),
                'password' => Hash::make($pass3)
            ],
            [
                'name' => 'Mifui',
                'email' => 'Mifui@gmail.com',
                'description' => Str::random(20),
                'password' => Hash::make($pass4)
            ],

        ];
        DB::table('users')->insert($users);
    }
}
