<?php

namespace App\CPU;

use App\Model\Brand;
use App\Model\Product;

class BrandManager
{
    public static function get_brands()
    {
        return Brand::withCount('brandProducts')->latest()->get();

    }

    public static function get_products($brand_id)
    {
        return Helpers::product_data_formatting(Product::where(['brand_id' => $brand_id])->get(), true);
    }
}
