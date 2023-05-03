<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('base', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
