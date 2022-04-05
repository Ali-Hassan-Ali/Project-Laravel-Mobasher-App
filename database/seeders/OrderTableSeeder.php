<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['order 1','order 2','order 3','order 4','order 5','order 6','order 7','order 8'];

        foreach ($users as $user) {

            \App\Models\Order::create([
                'user_id'      => 1,
                'apartment_id' => $user,
            ]);

        }//end of each

    }//en of run
    
}//end of class