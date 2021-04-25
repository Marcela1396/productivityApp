<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_team', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
            ->references('id')
            ->on('team')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('sprint_id');
            $table->foreign('sprint_id')
            ->references('id')
            ->on('sprint')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->float('sprint_team_capacity')->default(0);
            //$table->primary(['id','team_id', 'sprint_id']);
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
        Schema::dropIfExists('sprint_team');
    }
}
