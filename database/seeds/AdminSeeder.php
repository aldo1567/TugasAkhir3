<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Ronaldo',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'gender'=>'M',
            'age'=>'23',
            'phone_number'=>'088210378410',
            'password'=>'$2y$10$LY6sSh4w1Rp9ApdmRomWhOivFs9gNTbpBEhQ4mGzEVZCfYnDy225O',
        ]);
    }
}
