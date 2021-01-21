<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->references('assignment_id')
                ->on('assignments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tutor_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->text('details')->nullable(true);
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
        Schema::dropIfExists('applied_assignments');
    }
}
