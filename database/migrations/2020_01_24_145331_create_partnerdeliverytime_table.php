<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerdeliverytimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_delivery_time', function (Blueprint $table) {
            $table->bigInteger('partner_id')->unsigned();
            $table->bigInteger('delivery_time_id')->unsigned();
            $table->timestamps();
            $table->primary(['partner_id', 'delivery_time_id']);

            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
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
        Schema::dropIfExists('partner_delivery_time');
    }
}
