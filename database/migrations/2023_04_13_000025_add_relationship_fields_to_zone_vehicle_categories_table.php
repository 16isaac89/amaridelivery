<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZoneVehicleCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('zone_vehicle_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id', 'zone_fk_8322032')->references('id')->on('zones');
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->foreign('vehicle_category_id', 'vehicle_category_fk_8322033')->references('id')->on('vehicle_categories');
        });
    }
}
