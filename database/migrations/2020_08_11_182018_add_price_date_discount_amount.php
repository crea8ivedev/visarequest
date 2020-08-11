<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceDateDiscountAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_applications', function (Blueprint $table) {
            $table->datetime('application_applied_date')->after('service_id');
            $table->datetime('application_completed_date')->after('service_id')->nullable();
            $table->double('discount_amount')->after('service_id');
            $table->double('amount')->after('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_applications', function (Blueprint $table) {
            //
        });
    }
}
