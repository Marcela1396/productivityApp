<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dod_id');
            $table->foreign('dod_id')
            ->references('id')
            ->on('definition_of_done')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('user_story_id');
            $table->foreign('user_story_id')
            ->references('id')
            ->on('user_story')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->string('description','200')->nullable();
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
        Schema::dropIfExists('task');
    }
}
