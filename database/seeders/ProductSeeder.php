<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            ["product_name"=>"Domain"],
            ["product_name"=>"Hosting"],
            ["product_name"=>"Domain+Hosting"],
            ["product_name"=>"Domain+Hosting+ssl"],
            ["product_name"=>"Hosting+ssl"],
            ["product_name"=>"Other"]
        ];
        foreach($products as $product){
            Product::create($product);
        }
    }
}
