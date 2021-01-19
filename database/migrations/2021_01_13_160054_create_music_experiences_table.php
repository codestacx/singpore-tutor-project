<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_experiences', function (Blueprint $table) {
            $table->id('musci_experience_id');
            $table->integer('is_fulltime_music_teacher');
            $table->string('theory_level')->nullable(true);

            $table->json('proficiencies')->nullable(true);
            $table->text('other_music_details')->nullable(true);

            $table->integer('no_of_years_experience');

            $table->boolean('is_taught_in_school')->default(false);
            $table->text('taught_in_school_details')->nullable(true);

            $table->boolean('is_taught_in_private')->default(false);
            $table->text('taught_in_private_details')->nullable(true);

            $table->foreignId('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('music_experiences');
    }
}
