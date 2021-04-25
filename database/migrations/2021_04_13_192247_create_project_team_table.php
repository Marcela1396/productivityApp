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
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')
            ->on('project')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
            ->references('id')
            ->on('team')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            //$table->primary(['id','project_id', 'team_id',]);
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
