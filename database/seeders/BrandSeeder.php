<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Apple',
            'Huawei',
            'Xaiomi',
            'ZTE',
            'Samsung',
            'Lenovo',
        ];

        foreach ($brands as $b) {
            Brand::create([
                'slug' => uniqid(),
                'name' => $b,
            ]);
        }
    }
}
