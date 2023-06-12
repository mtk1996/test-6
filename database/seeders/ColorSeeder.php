<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['red', 'green', 'blue', 'black', 'white'];
        foreach ($colors as $c) {
            Color::create([
                'slug' => uniqid(),
                'name' => $c
            ]);
        }
    }
}
