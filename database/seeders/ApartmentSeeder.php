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
                'first_phone'=> '12241354',
                'last_phone' => '12241354',
                'description'=> 'description description description',
            ]);

            $apartments = ['apartment one','apartment tow','apartment three','apartment for'];

            foreach ($apartments as $key => $apartment) {

                $apartment = Apartment::create([
                    'corner'              => '1',
                    'near_the_road'       => '1',
                    'outstanding_teacher' => '1',
                    'schools'             => '1',
                    'markets'             => '1',
                    'other_services'      => '1',
                    'category_id'         => '1',
                    'number_rooms'        => '3',
                    'floor_rooms'         => '2',
                    'area_metres'         => '240',
                    'number_bathrooms'    => '240',
                    'generator'           => '1',
                    'balcony'             => '1',
                    'passenger_kitchen'   => '1',
                    'elevator'            => '1',
                    'city_id'             => '1',
                    'region_id'           => '1',
                    'number_rental_days'  => '1',
                    'price_range'         => '1',

                    'full_name'           => 'الاسم رباعي',
                    'first_phone'         => '0123456789',
                    'second_phone'        => '0123456789',
                    'ownership'           => 'ملكية الشقة',
                    
                    'user_id'             => '1',
                    'owner_id'            => $OwnerID->id,
                ]);

                // $properties = ['properties one','properties tow','properties three','properties for'];
                
                // foreach ($properties as $key => $propertie) {

                //     Propertie::create([
                //         'name'   => $propertie,
                //         'number' => $key,
                //         'apartment_id' => $apartment->id,
                //     ]);

                // }//end of each apartment

                $properties = ['1','2','3','4','5','6','7'];
                
                foreach ($properties as $key => $propertie) {

                    Media::create([
                        'name'   => $propertie,
                        'image'  => 'media_images/default.png',
                        'apartment_id' => $apartment->id,
                    ]);

                }//end of each apartment


            }//end of each apartment

            foreach ($apartments as $key => $apartment) {

                $apartment = Apartment::create([
                    'corner'              => '1',
                    'near_the_road'       => '1',
                    'outstanding_teacher' => '1',
                    'schools'             => '1',
                    'markets'             => '1',
                    'other_services'      => '1',
                    'category_id'         => '2',
                    'number_rooms'        => '3',
                    'floor_rooms'         => '2',
                    'area_metres'         => '240',
                    'number_bathrooms'    => '240',
                    'generator'           => '1',
                    'balcony'             => '1',
                    'passenger_kitchen'   => '1',
                    'elevator'            => '1',
                    'city_id'             => '1',
                    'region_id'           => '1',
                    'number_rental_days'  => '1',
                    'price_range'         => '1',

                    'full_name'           => 'الاسم رباعي',
                    'first_phone'         => '0123456789',
                    'second_phone'        => '0123456789',
                    'ownership'           => 'ملكية الشقة',
                    
                    'user_id'             => '1',
                    'owner_id'            => $OwnerID->id,
                ]);

                // $properties = ['properties one','properties tow','properties three','properties for'];
                
                // foreach ($properties as $key => $propertie) {

                //     Propertie::create([
                //         'name'   => $propertie,
                //         'number' => $key,
                //         'apartment_id' => $apartment->id,
                //     ]);

                // }//end of each apartment

                $properties = ['1','2','3','4','5','6','7'];
                
                foreach ($properties as $key => $propertie) {

                    Media::create([
                        'name'   => $propertie,
                        'image'  => 'media_images/default.png',
                        'apartment_id' => $apartment->id,
                    ]);

                }//end of each apartment


            }//end of each apartment

            foreach ($apartments as $key => $apartment) {

                $apartment = Apartment::create([
                    'corner'              => '1',
                    'near_the_road'       => '1',
                    'outstanding_teacher' => '1',
                    'schools'             => '1',
                    'markets'             => '1',
                    'other_services'      => '1',
                    'category_id'         => '3',
                    'number_rooms'        => '3',
                    'floor_rooms'         => '2',
                    'area_metres'         => '240',
                    'number_bathrooms'    => '240',
                    'generator'           => '1',
                    'balcony'             => '1',
                    'passenger_kitchen'   => '1',
                    'elevator'            => '1',
                    'city_id'             => '1',
                    'region_id'           => '1',
                    'number_rental_days'  => '1',
                    'price_range'         => '1',

                    'full_name'           => 'الاسم رباعي',
                    'first_phone'         => '0123456789',
                    'second_phone'        => '0123456789',
                    'ownership'           => 'ملكية الشقة',
                    
                    'user_id'             => '1',
                    'owner_id'            => $OwnerID->id,
                ]);

                // $properties = ['properties one','properties tow','properties three','properties for'];
                
                // foreach ($properties as $key => $propertie) {

                //     Propertie::create([
                //         'name'   => $propertie,
                //         'number' => $key,
                //         'apartment_id' => $apartment->id,
                //     ]);

                // }//end of each apartment

                $properties = ['1','2','3','4','5','6','7'];
                
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