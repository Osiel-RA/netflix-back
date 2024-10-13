<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('status')->insert(
            [
                'name'=> 'Activo',
                'description'=> 'El usuario se encuentra en la aplicación.'
            ],
            [
                'name'=> 'Inactivo',
                'description'=> 'El usuario no se encuentra en la aplicación.'
            ]
        );
    }
}
