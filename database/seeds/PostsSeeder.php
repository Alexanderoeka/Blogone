<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {

            $post=[
                'title'=>Str::random(9),
                'user_id'=>rand(1,4),
                'category_id'=>rand(1,5),
                'description'=>Str::random(15),
                'content'=>Str::random(400)


        ];


            DB::table('posts')->insert($post);

        }
    }
}
