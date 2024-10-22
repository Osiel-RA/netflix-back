<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeReactionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('type_reaction')->insert([
            [
                'name'=> 'No Me Gusta'
            ],
            [
                'name'=> 'Me Gusta'
            ],
            [
                'name'=> 'Me Encanta'
            ]
        ]);
    }
}
