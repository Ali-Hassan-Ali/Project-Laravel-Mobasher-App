<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        // $this->call(ApartmentSeeder::class);
        $this->call(RentSeeder::class);
        
    }//end of run

}//en dof run
