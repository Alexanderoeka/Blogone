<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

            [
                'name' => 'no_author',
                'email' => 'noauthor@gmail.com',
                'password' => Str::random(10)
            ],
            [
                'name' => 'AuthorOne',
                'email' => 'AuthorOne@gmail.com',
                'password' => Str::random(10)
            ],
            [
                'name' => 'Dmitrii',
                'email' => 'Dmitrii@gmail.com',
                'password' => Str::random(10)
            ],
            [
                'name' => 'Mifui',
                'email' => 'Mifui@gmail.com',
                'password' => Str::random(10)
            ],

        ];
        DB::table('users')->insert($users);
    }
}
