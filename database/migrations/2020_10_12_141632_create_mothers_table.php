<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->string('mother_nic');
            $table->string('mother_name');
            $table->string('midwife_id');
            $table->string('address');
            $table->string('telephone');
            $table->string('email');
            $table->string('gn_division')->nullable();
            $table->string('moh_division')->nullable();
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
        Schema::dropIfExists('mothers');
    }
}
