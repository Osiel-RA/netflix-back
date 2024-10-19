<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('category')->insert([
            [
                'name'=> 'Animes Shōnen'
            ],
            [
                'name'=> 'Animes'
            ],
            [
                'name'=> 'Deportes'
            ],
            [
                'name'=> 'Sci-fi'
            ],
            [
                'name'=> 'Fantasía'
            ],
            [
                'name'=> 'Dramas'
            ],
            [
                'name'=> 'Sociales'
            ],
            [
                'name'=> 'Música'
            ]
        ]);
    }
}
