<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'name'=>'Medi+',
            'motto'=>'Bringing Health to life for the whole family',
            'logo'=>'user/img/logo.png',
            'address'=>'Cluster East Asia.
            Jl. East Asia 3, RT.004/RW.003, Gondrong, Kec. Cipondoh, Kota Tangerang, Banten 15147',
            'map_address'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.532443132524!2d106.6996162!3d-6.193253!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9b893543c59%3A0x6cbf3dfbd31392b4!2sCluster%20East%20Asia.!5e0!3m2!1sid!2sid!4v1595473824733!5m2!1sid!2sid',
            'feature_title'=>'Welcome To Modern Clinic',
            'feature_desc'=>'asd',
            'doctor_title'=>'Our Doctors',
            'doctor_desc'=>'asd',
            'quality_title'=>'Quality Health',
            'quality_desc'=>'asd',
            'email'=>'email@email.com'
        ]);
    }
}
