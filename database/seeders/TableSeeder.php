<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [];

        for ($i=0; $i < 10; $i++) {
            array_push($tables, [
                'name' => fake()->name(),
                'guest_number' => fake()->numberBetween(1, 20),
                'status' => fake()->randomElement(['pending', 'available', 'unavailable']),
                'location' => fake()->randomElement(['front', 'inside', 'outside'])
            ]);
        }

        Table::insert($tables);
    }
}
