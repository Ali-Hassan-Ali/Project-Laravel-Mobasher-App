<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\apartment;
use App\Models\Propertie;
use App\Models\Media;
use App\Models\Owner;

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

            $OwnerID = Owner::create([
                'name'       => 'owner name',
                'phone'      => '12241354',
                'image_card' => 'image_card/default.png',
                'description'=> 'description description description',
            ]);

            $apartments = ['apartment one','apartment tow','apartment three','apartment for'];

            foreach ($apartments as $key => $apartment) {

                $apartment = Apartment::create([
                    'title'         => $apartment,
                    'location_floor'=> 3,
                    'number_rooms'  => 3,
                    'price'         => 3,
                    'description'   => 'description description description',
                    'category_id'   => 2,
                    'owner_id'      => $OwnerID,
                    'city_id'       => 1,
                    'user_id'       => 1,
                    'region_id'     => 4,
                ]);

                $properties = ['properties one','properties tow','properties three','properties for'];
                
                foreach ($properties as $key => $propertie) {

                    Propertie::create([
                        'name'   => $propertie,
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