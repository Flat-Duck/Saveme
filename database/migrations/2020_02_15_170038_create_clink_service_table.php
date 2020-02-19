<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinkServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clink_service', function (Blueprint $table) {
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('service_id')->unsigned()->index();
            $table->integer('doctor_id')->unsigned()->index();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clink_service');
    }
}
