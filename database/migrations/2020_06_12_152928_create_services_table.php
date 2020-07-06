<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->nullable();
            $table->integer('processor_id')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->double('normal_price')->nullable();
            $table->double('discount_price')->nullable();
            $table->double('commission')->nullable();
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
        Schema::dropIfExists('services');
    }
}
