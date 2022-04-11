<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = ['الخرطوم','بحري','امد رمان'];

        foreach ($citys as $city) {

            $apartments = ['apartment one','apartment tow','apartment three','apartment for'];

            foreach ($apartments as $key => $data) {

                Apartment::create([
                    'title' => $data,
                    'type'  => 'type',
                    'city'  => $city,
                    'state' => $city,
                    'dimensions'  => '300 X 300',
                    'small_room'  => true,
                    'description' => true,
                    'available_at'=> '2022-04-10 11:52:23',
                    'street'=> $city,
                    'price' => 200,
                    'class' => 2,
                ]);
                
            }//end of each apartment

        }//end of each citys
        
    }//end of run

}//end of seed 
