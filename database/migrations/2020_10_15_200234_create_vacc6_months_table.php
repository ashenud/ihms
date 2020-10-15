<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacc6MonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacc6_months', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id');
            $table->string('midwife_id');
            $table->string('approved_doctor_id');
            $table->integer('vac_id');
            $table->string('vac_name');
            $table->date('date_given');
            $table->string('batch_no');
            $table->string('side_effects');
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
        Schema::dropIfExists('vacc6_months');
    }
}
