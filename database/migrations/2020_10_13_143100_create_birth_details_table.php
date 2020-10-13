<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_details', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id');
            $table->string('midwife_id');
            $table->float('birth_weight');
            $table->float('birth_length');
            $table->string('health_states');
            $table->tinyInteger('apgar1');
            $table->tinyInteger('apgar2');
            $table->tinyInteger('apgar3');
            $table->float('circumference_of_head');
            $table->string('vitamin_K_status');
            $table->string('eye_contact');
            $table->string('milk_position');
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
        Schema::dropIfExists('birth_details');
    }
}
