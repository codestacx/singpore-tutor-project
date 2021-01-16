<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutor_requests', function (Blueprint $table) {
            $table->integer('grade')->change()->type('json');
            $table->text('description');
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
            $table->json('grade')->change()->type('integer');
            $table->dropColumn('description');
        });
    }
}
