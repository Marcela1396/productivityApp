<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberHasTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_has_task', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            
            $table->foreign('member_id')
            ->references('id')
            ->on('member')
            ->onDelete('cascade');

            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')
            ->references('id')
            ->on('task')
            ->onDelete('cascade');

            $table->float('worked_hours');
            $table->primary(['task_id', 'member_id']);
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
        Schema::dropIfExists('member_has_task');
    }
}
