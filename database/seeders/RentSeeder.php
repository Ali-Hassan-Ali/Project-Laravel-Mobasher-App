<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Rent;
class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   Rent::factory(100)->create();  //
    }
}
