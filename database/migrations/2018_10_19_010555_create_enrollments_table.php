<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('PK_EnrollmentID');
            $table->enum('Enrollment_Status',['Pending for Approval','Enrolled']);
            $table->enum('Enrollment_GradingPeriod',['First','Second','Third','Fourth']);
            $table->decimal('Enrollment_Grade',5,2)->nullable();
            $table->integer('FK_SubjectID')->unsigned()->nullable();
            $table->integer('FK_StudentID')->unsigned()->nullable();
            $table->foreign('FK_SubjectID')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('FK_StudentID')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('enrollments');
    }
}
