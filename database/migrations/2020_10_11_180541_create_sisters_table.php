<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisters', function (Blueprint $table) {
            $table->id();
            $table->string('sister_id')->unique();
            $table->string('sister_name');
            $table->integer('gn_division')->nullable();
            $table->integer('moh_division')->nullable();
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sisters');
    }
}
