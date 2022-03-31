<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory(400)->create();
    }
}
