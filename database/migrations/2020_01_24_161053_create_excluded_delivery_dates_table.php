<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludedDeliveryDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluded_delivery_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date");
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('delivery_time_id')->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('delivery_time_id')->references('id')->on('delivery_times')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excluded_delivery_dates');
    }
}
