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
            'name' =>'monbrancake',
            'price' => 600,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006849/departcheck/monburancake_ggqdax.jpg',
            ]);
            
        DB::table('products')->insert([
            'name' =>'cheezecake',
            'price' => 500,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006850/departcheck/cheeze-cake_dypfni.jpg',
            ]);
        
        DB::table('products')->insert([
            'name' =>'muffin',
            'price' => 450,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006850/departcheck/muffin_l5xdwb.jpg',
            ]);
            
        DB::table('products')->insert([
            'name' =>'macaron',
            'price' => 250,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006849/departcheck/macaron_tezvcy.jpg',
            ]);
            
        DB::table('products')->insert([
            'name' =>'chocolate',
            'price' => 1000,
            'stock' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'image_url' =>'https://res.cloudinary.com/dkl3o6b4g/image/upload/v1675006850/departcheck/chocolate_ntkdnf.jpg',
            ]);

    }
}
