<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\apartment;
use App\Models\Propertie;
use App\Models\Media;

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

                $apartment = Apartment::create([
                    'title' => $data,
                    'type'  => 'type',
                    'city'  => $city,
                    'state' => $city,
                    'dimensions'  => '300 X 300',
                    'small_room'  => true,
                    'description' => true,
                    'available_at'=> now(),
                    'street'=> $city,
                    'price' => 200,
                    'class' => 2,
                    'category_id' => 2,
                ]);

                $properties = ['properties one','properties tow','properties three','properties for'];
                
                foreach ($properties as $key => $data) {

                    Propertie::create([
                        'name'   => $data,
                        'number' => $key,
                        'apartment_id' => $apartment->id,
                    ]);

                }//end of each apartment

                $properties = ['name image one','name image tow','name image three','name image for'];
                
                foreach ($properties as $key => $propertie) {

                    Media::create([
                        'name'   => $propertie,
                        'image'  => 'media_images/default.png',
                        'apartment_id' => $apartment->id,
                    ]);

                }//end of each apartment


            }//end of each apartment

        }//end of each citys
        
    }//end of run

}//end of seed 