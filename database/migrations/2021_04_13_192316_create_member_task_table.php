<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
            ->references('id')
            ->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')
            ->references('id')
            ->on('task')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->float('worked_hours')->default(0);
            //$table->primary(['task_id', 'member_id']);
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
        Schema::dropIfExists('member_task');
    }
}
