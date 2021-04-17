<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->foreign('role_id')
            ->references('id')
            ->on('role')
            ->onDelete('cascade');
            $table->timestamps();
            
            $table->string('id_number','50');
            $table->string('name','100');
            $table->string('email','50')->nullable();
            $table->string('speciality','100')->nullable();
            $table->unsignedBigInteger('role_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
