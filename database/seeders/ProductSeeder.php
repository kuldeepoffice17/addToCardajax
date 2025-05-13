<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' =>'Laptop',
            'price' => "10000"
        ]);
        Product::create([
            'name' =>'Mobil',
            'price' => "7000"
        ]);
        Product::create([
            'name' =>'Fan',
            'price' => "1500"
        ]);
        Product::create([
            'name' =>'AC',
            'price' => "20000"
        ]);
    }
}
