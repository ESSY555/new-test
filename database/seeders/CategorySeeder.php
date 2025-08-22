<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['electronics', 'clothing', 'books', 'home', 'sports'];
        
        // Get all products that don't have categories
        $productsWithoutCategories = Product::whereNull('category')->get();
        
        foreach ($productsWithoutCategories as $product) {
            $product->update([
                'category' => $categories[array_rand($categories)]
            ]);
        }
        
        $this->command->info('Categories assigned to ' . $productsWithoutCategories->count() . ' products.');
    }
}
