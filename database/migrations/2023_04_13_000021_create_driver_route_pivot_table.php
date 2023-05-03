<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverRoutePivotTable extends Migration
{
    public function up()
    {
        Schema::create('driver_route', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id', 'driver_id_fk_8321962')->references('id')->on('drivers')->onDelete('cascade');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id', 'route_id_fk_8321962')->references('id')->on('routes')->onDelete('cascade');
        });
    }
}
