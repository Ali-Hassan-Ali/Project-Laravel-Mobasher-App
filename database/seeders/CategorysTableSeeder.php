<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = ['شقق مفروشة','عقارات','مزارع'];

        foreach ($categorys as $category) {
            
            \App\Models\Category::create([
                'name'  => $category,
                'image' => 'categorys_images/default.png',
            ]);

        }//end of each

    }//end of run

}//end of seed
