<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinkDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clink_doctor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('doctor_id')->unsigned()->index();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('clink_doctor');
    }
}
