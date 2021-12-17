<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('products')->insert([
          'name' => 'Bakuchiol Skinpair Oil Serum - 20ml',
          'categori' => 'Skinpair',
          'brand' => 'Bakuchiol',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Bakuchiol Skinpair Oil Serum - 20ml.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
        DB::table('products')->insert([
          'name' => 'Body Lotion Romansa',
          'categori' => 'Lotion',
          'brand' => 'Romansa',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Body Lotion Romansa.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
        DB::table('products')->insert([
          'name' => 'Brightly Ever After Serum',
          'categori' => 'Serum',
          'brand' => 'Bright',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Brightly Ever After Serum.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
        DB::table('products')->insert([
          'name' => 'Brow Wiz',
          'categori' => 'Skinpair',
          'brand' => 'Brow',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Brow Wiz.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
        DB::table('products')->insert([
          'name' => 'Forever Stay Eyeliner',
          'categori' => 'Eyeliner',
          'brand' => 'Forever',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Forever Stay Eyeliner.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
        DB::table('products')->insert([
          'name' => 'Shower Pomegrante',
          'categori' => 'Skinpair',
          'brand' => 'Bakuchiol',
          'stock' => 10,
          'price' => 20000,
          'supplier_id' => 1,
          'info' => '-',
          'image' => 'Shower Pomegrante.jpg',
          'discount' => 0,
          'rating' => 1,
        ]);
      }
}
