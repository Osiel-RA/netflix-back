<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PayMethodSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('pay_method')->insert(
            [
                'name'=> 'VISA',
                'description'=> 'Realización compras en comercios multinacionales.'
            ],
            [
                'name'=> 'MASTERCARD',
                'description'=> 'Realización compras en comercios de multiples países.'
            ]
        );
    }
}
