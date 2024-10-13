<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('author')->insert([
            ['name' => 'Bao Nguyen'],
            ['name' => 'Takehiko Inoue'],
            ['name' => 'Nobutaka Nishizawa'],
            ['name' => 'Yoo In-sik'],
            ['name' => 'Moon Ji-won'],
            ['name' => 'Michael Gracey'],
            ['name' => 'Gerardo Gatica'],
            ['name' => 'Luis Gerardo Méndez']
        ]);
    }
}   
