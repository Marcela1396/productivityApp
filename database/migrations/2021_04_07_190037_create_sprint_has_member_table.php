<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintHasMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_has_member', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('member');
            $table->unsignedBigInteger('sprint_id');
            $table->foreign('sprint_id')->references('id')->on('sprint');
            $table->float('assigned_hours');
            $table->float('capacity');
            $table->primary(['sprint_id', 'member_id']);
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
        Schema::dropIfExists('sprint_has_member');
    }
}
