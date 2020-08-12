<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('abouts')->insert([
            'title'=>'About Us',
            'desc'=>'NANII?',
            'img'=>'asd.gif'
        ]);
    }
}
