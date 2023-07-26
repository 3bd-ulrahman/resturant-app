<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        $users = [];

        for ($i=0; $i < 5; $i++) {
            array_push($users, [
                'name' => fake()->name(),
                'email' => fake()->email(),
                'email_verified_at' => now(),
                'password' => fake()->password()
            ]);
        }

        User::insert($users);
    }
}
