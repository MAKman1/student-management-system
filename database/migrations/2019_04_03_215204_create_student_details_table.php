<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger( 'student_id');

            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->integer('postal_code');
            $table->string('country');

            $table->string('identity_number')->nullable();

            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();

            $table->string('previous_school')->nullable();
            $table->string('class_admitted_in');
            $table->date('date_of_admission');
            $table->date( 'date_of_leave')->nullable();

            $table->string('medical_conditions')->nullable();
            $table->string('additional_notes')->nullable();

            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');

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
        Schema::dropIfExists('student_details');
    }
}
