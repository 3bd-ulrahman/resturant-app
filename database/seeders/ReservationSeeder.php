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

        for ($i=0; $i < 10; $i++) {
            array_push($reservations, [
                'table_id' => rand(1, 10),
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'guest_number' => fake()->numberBetween(1, 100),
                'date' => fake()->date('Y-m-d\TH:i:s')
            ]);
        }

        Reservation::insert($reservations);
    }
}
