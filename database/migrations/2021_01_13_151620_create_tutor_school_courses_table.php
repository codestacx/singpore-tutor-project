<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorSchoolCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_school_courses', function (Blueprint $table) {
            $table->id('_id');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('education_id')->references('education_id')->on('education_infos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('school_level');
            $table->string('school_name');

            $table->string('start_month');
            $table->string('start_year');

            $table->string('end_month');
            $table->string('end_year');


            $table->json('subjects_and_grades')->nullable(true);


            $table->text('achievements')->nullable(true);



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
        Schema::dropIfExists('tutor_school_courses');
    }
}
