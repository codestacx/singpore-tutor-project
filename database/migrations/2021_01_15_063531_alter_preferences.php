<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPreferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->text('description')->nullable(true);
        //    $table->json('location')->nullable(true);
//            $table->string('lower_primary_rate')->nullable(true);
//            $table->string('upper_primary_rate')->nullable(true);
//            $table->string('lower_secondary_rate')->nullable(true);
//            $table->string('uper_secondary_rate')->nullable(true);
//            $table->string('jc_rate')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preferences', function (Blueprint $table) {
           $table->dropColumn('description');
        });
    }
}
