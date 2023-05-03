<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('phone_1')->unique();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('password');
            $table->string('phone_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
