<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        apartment::factory(400)->create();
    }
}
