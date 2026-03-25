<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::insert([
            [
                'name' => 'Appartement centre-ville',
                'description' => 'Très beau logement moderne au cœur de la ville',
                'price_per_night' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maison avec piscine',
                'description' => 'Grande maison familiale avec piscine et jardin',
                'price_per_night' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Studio cosy',
                'description' => 'Petit studio parfait pour étudiant ou court séjour',
                'price_per_night' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Villa de luxe',
                'description' => 'Villa haut standing avec vue panoramique',
                'price_per_night' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Appartement proche université',
                'description' => 'Idéal pour étudiants, proche transports et campus',
                'price_per_night' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}