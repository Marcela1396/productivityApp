<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_team', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('team_id');

            $table->foreign('project_id')->references('id')
            ->on('project')
            ->onDelete('cascade');

            $table->foreign('team_id')
            ->references('id')
            ->on('team')
            ->onDelete('cascade');
            
            $table->primary(['project_id', 'team_id',]);
            $table->float('project_team_capacity')->default(0);
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
        Schema::dropIfExists('project_team');
    }
}
