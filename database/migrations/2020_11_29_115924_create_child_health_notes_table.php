<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildHealthNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_health_notes', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id');
            $table->string('midwife_id');
            $table->string('baby_age_group');
            $table->integer('baby_age_group_id');
            $table->string('eye_size');
            $table->string('squint');
            $table->string('retina');
            $table->string('cornea');
            $table->string('eye_movement');
            $table->string('hearing');
            $table->string('weight');
            $table->string('height');
            $table->string('development');
            $table->string('heart');
            $table->string('hip');
            $table->string('other')->nullable();
            $table->string('doctor_id');
            $table->date('clinic_date');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('child_health_notes');
    }
}
