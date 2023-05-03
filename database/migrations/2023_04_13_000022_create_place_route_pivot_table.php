<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceRoutePivotTable extends Migration
{
    public function up()
    {
        Schema::create('place_route', function (Blueprint $table) {
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id', 'route_id_fk_8322055')->references('id')->on('routes')->onDelete('cascade');
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id', 'place_id_fk_8322055')->references('id')->on('places')->onDelete('cascade');
        });
    }
}
