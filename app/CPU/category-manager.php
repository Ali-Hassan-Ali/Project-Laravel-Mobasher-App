<?php

namespace App\CPU;

use App\Model\Category;
use App\Model\Product;

class CategoryManager
{
    public static function parents()
    {
        $x = Category::with(['childes.childes'])->where('position', 0)->get();
        return $x;
    }

    public static function child($parent_id)
    {
        $x = Category::where(['parent_id' => $parent_id])->get();
        return $x;
    }

    public static function products($category_id)
    {
        $products = Product::active()->get();
        $product_ids = [];
        foreach ($products as $product) {
            foreach (json_decode($product['category_ids'], true) as $category) {
                if ($category['id'] == $category_id) {
                    array_push($product_ids, $product['id']);
                }
            }
        }
        return Product::whereIn('id', $product_ids)->get();
    }
}
