<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'DSLR Camera', 'slug' => 'dslr-camera', 'icon' => 'camera'],
            ['name' => 'Mirrorless Camera', 'slug' => 'mirrorless-camera', 'icon' => 'camera'],
            ['name' => 'Lensa', 'slug' => 'lensa', 'icon' => 'circle'],
            ['name' => 'Tripod', 'slug' => 'tripod', 'icon' => 'maximize'],
            ['name' => 'Aksesoris', 'slug' => 'aksesoris', 'icon' => 'box'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
