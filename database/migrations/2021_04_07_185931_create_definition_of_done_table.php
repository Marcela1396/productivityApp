<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionOfDoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_of_done', function (Blueprint $table) {
            $table->id();
            $table->foreign('project_id')
            ->references('id')
            ->on('project')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('name','200');
            $table->unsignedBigInteger('project_id');
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
        Schema::dropIfExists('definition_of_done');
    }
}
