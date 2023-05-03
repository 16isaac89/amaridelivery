<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneVehicleCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('zone_vehicle_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
