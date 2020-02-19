<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinkTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clink_test', function (Blueprint $table) {
            $table->integer('clink_id')->unsigned()->index();
            $table->integer('test_id')->unsigned()->index();
            
            $table->foreign('clink_id')->references('id')->on('clinks');
            $table->foreign('test_id')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clink_test');
    }
}
