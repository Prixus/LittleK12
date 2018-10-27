<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('User_UserName',100);
          $table->string('User_FirstName',50);
          $table->string('User_MiddleName',50);
          $table->string('User_LastName',50);
          $table->string('User_Password',50);
          $table->enum('User_AccessLevel',['Admin','Coordinator','Student']);
          $table->string('User_Email')->unique();
          $table->string('User_Address',255);
          $table->string('User_ContactNumber',11);
          $table->string('User_ProfileImage',1028)->default("profilepicture/profilepicture.jpg");
          $table->integer('FK_StudentID')->unsigned()->nullable();
          $table->integer('FK_DepartmentID')->unsigned()->nullable();
          $table->foreign('FK_StudentID')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('FK_DepartmentID')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
