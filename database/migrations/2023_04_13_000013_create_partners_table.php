<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('phone');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
