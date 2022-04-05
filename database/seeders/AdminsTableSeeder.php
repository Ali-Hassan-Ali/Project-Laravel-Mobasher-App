<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name'     => 'admin',
            'phone'    => '123123123',
            'email'    => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $admin->attachRole('super_admin');

    }//end of run
    
}//end of class