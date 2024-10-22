<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder {
    /** 
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('classification')->insert([
            [
                'name'=> 'violencia'
            ],
            [
                'name'=> 'acción'
            ],
            [
                'name'=> 'lenguaje inapropiado'
            ],
            [
                'name'=> 'desnudos'
            ],
            [
                'name'=> 'miedo'
            ],
            [
                'name'=> 'drogas'
            ]
        ]);
    }
}
