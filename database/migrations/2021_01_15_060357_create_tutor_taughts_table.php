<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorTaughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_taughts', function (Blueprint $table) {
            $table->id('tutor_taughts_id');
            $table->foreignId('preference_id')->references('tutor_preference_id')
                ->on('preferences')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('level');
            $table->integer('grade');
            $table->integer('subject');
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
        Schema::dropIfExists('tutor_taughts');
    }
}
