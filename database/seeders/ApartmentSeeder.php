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
        Apartment::factory(400)->create();
    }
}
