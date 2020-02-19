<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinkSpecialtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clink_specialty', function (Blueprint $table) {
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('specialty_id')->unsigned()->index();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('specialty_id')->references('id')->on('specialties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clink_specialty');
    }
}
