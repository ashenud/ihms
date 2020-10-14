<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_messages', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->string('sender');
            $table->string('message');
            $table->timestamp('date')->useCurrent();
            $table->integer('read_status')->default('1')->comment('1-unread, 0-read');
            $table->integer('status')->default('1')->comment('1-active, 0-delete');
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
        Schema::dropIfExists('doctor_messages');
    }
}
