<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaseModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lease_models', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->rememberToken();
                $table->string('username');
                $table->string('assetid');
                $table->string('startdate');
                $table->string('enddate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lease_models');
    }
}
