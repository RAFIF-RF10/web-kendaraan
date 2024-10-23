<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            [
                'type' => 'passenger',
                'model' => 'Toyota HiAce',
                'is_rented' => false,
                'fuel_type' => 'diesel',
                'last_service' => '2024-01-10',
            ],
            [
                'type' => 'cargo',
                'model' => 'Isuzu ELF',
                'is_rented' => false,
                'fuel_type' => 'diesel',
                'last_service' => '2024-01-15',
            ],
            [
                'type' => 'passenger',
                'model' => 'Honda Mobilio',
                'is_rented' => false,
                'fuel_type' => 'gasoline',
                'last_service' => '2024-02-01',
            ],
        ]);
    }
}
