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


        }//end of each

        // $sub_citys = ['اركويت','الصحافة','جبرة'];

        // foreach ($sub_citys as $sub) {

        //     \App\Models\City::create([
        //         'name'      => $sub,
        //         'parent_id' => 1,
        //     ]);

        // }//end of each

        // $sub_citys = ['الشهداء','المهندسين','المربعات'];

        // foreach ($sub_citys as $sub) {

        //     \App\Models\City::create([
        //         'name'      => $sub,
        //         'parent_id' => 2,
        //     ]);

        // }//end of each

        // $sub_citys = ['الوسطي'];

        // foreach ($sub_citys as $sub) {

        //     \App\Models\City::create([
        //         'name'      => $sub,
        //         'parent_id' => 3,
        //     ]);

        // }//end of each

    }//end of run
    
}//end of class
