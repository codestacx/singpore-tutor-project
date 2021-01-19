<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorRequestsAddRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutor_requests', function (Blueprint $table) {
            $table->string('rate')->nullable(true);
            $table->string('area')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutor_requests', function (Blueprint $table) {
            $table->dropColumn('rate');
            $table->dropColumn('area');
        });
    }
}
