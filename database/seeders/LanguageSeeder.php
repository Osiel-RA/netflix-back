<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('language')->insert(
            [
                'name'=> 'Español'
            ],
            [
                'name'=> 'Ingles'
            ],
            [
                'name'=> 'Japones'
            ],
            [
                'name'=> 'Coreano'
            ],
            [
                'name'=> 'Frances'
            ]
        );
    }
}
