<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'title' => 'Программирование',
                'description' => Str::random(20)
            ],
            [
                'title' => 'Спорт',
                'description' => Str::random(20)
            ],
            [
                'title' => 'Коммуникации',
                'description' => Str::random(20)
            ],
            [
                'title' => 'Кулинария',
                'description' => Str::random(20)
            ],
            [
                'title' => 'Авто',
                'description' => Str::random(20)
            ]


        ];
        DB::table('categories')->insert($categories);
    }
}
