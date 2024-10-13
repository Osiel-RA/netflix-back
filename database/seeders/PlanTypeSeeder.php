<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlanTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('plan_type')->insert(
            [
                'name'=> 'Estándar con Anuncios',
                'description'=> 'Calidad de audio y video: Buena.
                Resolución: 1080 (Full HD).
                Anuncios: Menos de los que esperas.',
                'import'=> 99.00,
                'devices'=> 4
            ],
            [
                'name'=> 'Estándar',
                'description'=> 'Calidad de audio y video: Buena.
                Resolución: 1080 (Full HD).
                Anuncios: sin anuncios.',
                'import'=> 219.00,
                'devices'=> 4
            ],
            [
                'name'=> 'Premium',
                'description'=> 'Calidad de audio y video: optima.
                Resolución: 4K (Ultra HD) + HDR.
                Anuncios: sin anuncios.',
                'import'=> 299.00,
                'devices'=> 4
            ]
        );
    }
}
