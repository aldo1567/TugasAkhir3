<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('motto');
            $table->text('logo');
            $table->text('address');
            $table->text('map_address');
            $table->text('feature_title');
            $table->text('feature_desc');
            $table->text('doctor_title');
            $table->text('doctor_desc');
            $table->text('quality_title');
            $table->text('quality_desc');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
