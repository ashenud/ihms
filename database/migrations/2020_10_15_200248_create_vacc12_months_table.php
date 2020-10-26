<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacc12MonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacc12_months', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id');
            $table->string('midwife_id');
            $table->string('approved_doctor_id')->nullable();
            $table->integer('vac_id');
            $table->string('vac_name');
            $table->date('date_given')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('side_effects')->nullable();
            $table->integer('status')->default('1')->comment('1-given, 0-not given');
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
        Schema::dropIfExists('vacc12_months');
    }
}
