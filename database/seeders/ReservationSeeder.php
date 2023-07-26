<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [];

        for ($i=0; $i < 20; $i++) {
            array_push($reservations, [
                'user_id' => fake()->numberBetween(1, 5),
                'table_id' => rand(1, 10),
                'guest_number' => fake()->numberBetween(1, 50),
                'date' => fake()->date('Y-m-d')
            ]);
        }

        Reservation::insert($reservations);
    }
}
