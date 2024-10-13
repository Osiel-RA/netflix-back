<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Descomentar si quieres crear usuarios de prueba.
        // User::factory(10)->create();

        // Usuario de prueba
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Llamar a los seeders personalizados
        $this->call([
            AuthorSeeder::class,
            CardSeeder::class,
            CategorySeeder::class,
            ClassificationSeeder::class,
            LanguageSeeder::class,
            PayMethodSeeder::class,
            PlanTypeSeeder::class,
            StatusSeeder::class,
            TypeReactionSeeder::class,
        ]);
    }
}