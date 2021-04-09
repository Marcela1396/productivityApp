<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_story', function (Blueprint $table) {
            $table->id();
            $table->string('name','50');
            $table->string('description','100')->nullable();
            $table->char('state','1');
            $table->tinyInteger('priority');
            $table->unsignedBigInteger('sbacklog_id');
            $table->foreign('sbacklog_id')
            ->references('id')
            ->on('sprint_backlog')
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
        Schema::dropIfExists('user_story');
    }
}
