<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_experiences', function (Blueprint $table) {
            $table->id('academic_experience_id');
            $table->foreignId('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->string('is_taught_in_moe');

            //if taught in moe school
            $table->string('moe_number_experience')->nullable(true);
            $table->json('moe_experiences')->nullable(true);


            $table->string('private_number_experience')->nullable(true);
            $table->json('private_experiences')->nullable(true);


            $table->json('students_taught')->nullable(true);


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
        Schema::dropIfExists('academic_experiences');
    }
}
