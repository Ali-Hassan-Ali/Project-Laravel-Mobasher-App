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
        $categorys = ['شقق فندقية' ,'شقق عادية' ,'شقق مفروشة'];

        foreach ($categorys as $category) {
            
            \App\Models\Category::create([
                'name'  => $category,
            ]);

        }//end of each

    }//end of run

}//end of seed
