<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            'status'=>'Complete'
        ]);
        DB::table('statuses')->insert([
            'status'=>'Cancel'
        ]);
        DB::table('statuses')->insert([
            'status'=>'Reserved'
        ]);
    }
}
