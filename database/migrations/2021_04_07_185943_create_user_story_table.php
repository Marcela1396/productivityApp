<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStoryTable extends Migration
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
            $table->unsignedBigInteger('sprint_id');
            $table->foreign('sprint_id')
            ->references('id')
            ->on('sprint')
            ->onUpdate('cascade')
            ->onDelete('cascade');
           
            $table->string('name','100');
            $table->string('description','100')->nullable();
            $table->char('state','1')->default('C');
            $table->tinyInteger('priority')->default(1);
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
