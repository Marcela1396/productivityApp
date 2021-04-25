<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_sprint', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
            ->references('id')
            ->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('sprint_id');
            $table->foreign('sprint_id')
            ->references('id')
            ->on('sprint')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->float('assigned_hours')->nullable();
            $table->float('capacity')->default(0);
            //$table->primary(['id','sprint_id', 'member_id']);
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
        Schema::dropIfExists('member_sprint');
    }
}
