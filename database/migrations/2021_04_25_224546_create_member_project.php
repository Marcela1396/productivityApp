<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_project', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
            ->references('id')
            ->on('project')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
            ->references('id')
            ->on('team')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
            ->references('id')
            ->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
            ->references('id')
            ->on('role')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('members_project');
    }
}
