<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger( 'student_id');

            $table->string('guardian1_name');
            $table->string('guardian1_profession');
            $table->string('guardian1_identity_number');
            $table->string('guardian1_relation');
            
            $table->string('guardian1_address_line1');
            $table->string('guardian1_address_line2')->nullable();
            $table->string('guardian1_city');
            $table->integer('guardian1_postal_code');
            $table->string('guardian1_country');

            $table->string('guardian1_email')->nullable();
            $table->string('guardian1_contact_number_1');
            $table->string('guardian1_contact_number_2')->nullable();



            $table->boolean('has_second_guardian');



            $table->string('guardian2_name')->nullable();
            $table->string('guardian2_profession')->nullable();
            $table->string('guardian2_relation')->nullable();

            $table->string('guardian2_address_line1')->nullable();
            $table->string('guardian2_address_line2')->nullable();
            $table->string('guardian2_city')->nullable();
            $table->integer('guardian2_postal_code')->nullable();
            $table->string('guardian2_country')->nullable();

            $table->string('guardian2_email')->nullable();
            $table->string('guardian2_contact_number_1')->nullable();
            $table->string('guardian2_contact_number_2')->nullable();

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
        Schema::dropIfExists('guardian_details');
    }
}
