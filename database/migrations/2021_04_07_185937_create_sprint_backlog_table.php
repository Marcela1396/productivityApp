<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintBacklogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_backlog', function (Blueprint $table) {
            $table->id();
            $table->float('sprint_backlog_hours');
            $table->unsignedBigInteger('sprint_id');
            $table->foreign('sprint_id')->references('id')->on('sprint');
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
        Schema::dropIfExists('sprint_backlog');
    }
}
