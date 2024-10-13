<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('card')->insert(
            [
                'name'=> 'VISA',
                'description'=> 'Tarjeta de crédito que 
                puede utilizarse en muchos países del mundo.',
                'name_bank'=> 'Santander'
            ]
        );
    }
}
