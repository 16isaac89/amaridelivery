<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('thirdname')->nullable();
            $table->string('email')->unique();
            $table->string('fcm')->nullable();
            $table->string('phone_1')->unique();
            $table->string('phone_2')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
