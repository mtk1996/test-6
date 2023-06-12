<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = [
            ['name' => 'Eelectronic', 'mm_name' => 'လျှပ်စစ်ပစ္စည်း'],
            ['name' => 'T-Shirt', 'mm_name' => 'အကျီ'],
            ['name' => 'Mobiel Phone', 'mm_name' => 'ဖုန်း'],
            ['name' => 'Hat', 'mm_name' => 'ဦးထုတ်'],
            ['name' => 'Shoe', 'mm_name' => 'ဖိနပ်'],
            ['name' => 'Speaker', 'mm_name' => 'စပီကာ'],
            ['name' => 'Ear Buds', 'mm_name' => 'နားကျပ်'],
            ['name' => 'Furniture', 'mm_name' => 'ပရိဘောဂ'],
        ];
        foreach ($cate as $c) {
            Category::create([
                'slug' => uniqid(),
                'name' => $c['name'],
                'mm_name' => $c['mm_name'],
                'image' => "category.png",
            ]);
        }
    }
}
