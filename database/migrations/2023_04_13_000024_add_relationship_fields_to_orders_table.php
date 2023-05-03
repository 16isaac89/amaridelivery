<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id', 'driver_fk_8310141')->references('id')->on('drivers');
            $table->unsignedBigInteger('route_id')->nullable();
            $table->foreign('route_id', 'route_fk_8321961')->references('id')->on('routes');
        });
    }
}
