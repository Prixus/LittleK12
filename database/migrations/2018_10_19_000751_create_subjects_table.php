<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Subject_ID',25)->unique();
            $table->string('Subject_Name',50);
            $table->string('Subject_Picture',1028);
            $table->string('Subject_Description',1028);
            $table->string('Subject_Day',255);
            $table->time('Subject_StartTime');
            $table->time('Subject_EndTime');
            $table->string('Subject_Year',255);
            $table->integer('FK_UserID')->unsigned()->nullable();
            $table->foreign('FK_UserID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('subjects');
    }
}
