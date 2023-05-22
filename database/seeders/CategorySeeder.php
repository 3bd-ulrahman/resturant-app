<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];

        $image = fake()->image();
        $path = 'images/categories/' . basename($image);
        Storage::disk(STORAGE_DISK)->put(
            $path,
            file_get_contents($image)
        );


        for ($i = 0; $i < 10; $i++) {
            array_push($categories, [
                'name' => fake()->name(),
                'description' => fake()->text(),
                'image' => $path
            ]);
        }

        Category::insert($categories);
    }
}
