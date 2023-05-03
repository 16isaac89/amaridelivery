<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size');
            $table->string('vehicle');
            $table->string('from');
            $table->string('to');
            $table->string('money')->nullable();
            $table->string('distance')->nullable();
            $table->datetime('datetime')->nullable();
            $table->string('txn')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
