<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = \DB::table('admins')->insert([
            'name'     => 'admin',
            'phone'    => '123123123',
            'email'    => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $admin->attachRole('super_admin');

    }//end of run
    
}//end of class