<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('music_experiences', function (Blueprint $table) {
            $table->renameColumn('musci_experience_id','music_experience_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('music_experiences', function (Blueprint $table) {
           $table->renameColumn('music_experience_id','musci_experience_id');
        });
    }
}
