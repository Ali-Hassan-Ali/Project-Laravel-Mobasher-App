<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\apartment;

class apartmentSeeder extends Seeder
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
