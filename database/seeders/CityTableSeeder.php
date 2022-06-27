<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = ['الخرطوم','امدرمان','بحري'];

        foreach ($citys as $city) {
            
            $city = \App\Models\City::create([
                'name' => $city,
            ]);

            $sub_citys = ['واحد','اتنين','ثلاثه'];

            foreach ($sub_citys as $sub) {

                \App\Models\City::create([
                    'name'      => $sub,
                    'parent_id' => $city->id,
                ]);

            }//end of each

        }//end of each

    }//end of run
    
}//end of class
