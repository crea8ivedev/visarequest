<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('country_code')->nullale();
            $table->string('name')->nullale();
            $table->string('region_code')->nullale();
            $table->string('region_name')->nullale();
            $table->string('city')->nullale();
            $table->string('zip_code')->nullale();
            $table->string('time_zone')->nullale();
            $table->string('latitude')->nullale();
            $table->string('longitude')->nullale();
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
        Schema::dropIfExists('statistics');
    }
}
