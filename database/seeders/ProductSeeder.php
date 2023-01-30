<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' =>'shortcake',
            'price' => 600,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006849/departcheck/short-cake_uqwpbf.jpg',
            ]);

    }
}
