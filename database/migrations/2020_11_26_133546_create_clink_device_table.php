<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinkDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clink_device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('device_id')->unsigned()->index();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('device_id')->references('id')->on('devices');
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
        Schema::dropIfExists('clink_device');
    }
}
