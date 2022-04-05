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
        $users = ['1','2','3','4','5','6','7','8','9'];

        foreach ($users as $user) {

            \App\Models\Order::create([
                'user_id'      => 1,
                'apartment_id' => $user,
            ]);

        }//end of each

    }//en of run
    
}//end of class