<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->integer('distance')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
