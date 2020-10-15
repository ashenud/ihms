<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_dates', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id');
            $table->string('midwife_id');
            $table->integer('vac_id');
            $table->string('vac_name');
            $table->date('giving_date');
            $table->integer('approvel_status')->default('0')->comment('1-approved, 0-not approved');
            $table->integer('given_status')->default('0')->comment('1-given, 0-not given');
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
        Schema::dropIfExists('vaccine_dates');
    }
}
