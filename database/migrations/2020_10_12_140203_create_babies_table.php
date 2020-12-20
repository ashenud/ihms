<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babies', function (Blueprint $table) {
            $table->id();
            $table->string('baby_id')->unique();
            $table->string('baby_first_name');
            $table->string('baby_last_name');
            $table->date('baby_dob');
            $table->string('baby_gender');
            $table->date('register_date');
            $table->string('midwife_id');
            $table->string('mother_nic');
            $table->integer('mother_age');
            $table->integer('status')->default('1')->comment('1-active, 0-inactive');
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
        Schema::dropIfExists('babies');
    }
}
