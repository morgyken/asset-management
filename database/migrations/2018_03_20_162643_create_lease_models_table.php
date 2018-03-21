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
                $table->string('username')->nullable();
                $table->string('assetid')->nullable();
                $table->string('startdate') ->nullable();
                $table->string('enddate') ->nullable();
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
