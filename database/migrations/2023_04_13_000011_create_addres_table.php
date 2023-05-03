<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddresTable extends Migration
{
    public function up()
    {
        Schema::create('addres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('value');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
