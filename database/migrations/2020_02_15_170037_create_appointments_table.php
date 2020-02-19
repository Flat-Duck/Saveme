<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->time('start_time');
            $table->string('day')->nullable();
            $table->time('finish_time');
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('doctor_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
