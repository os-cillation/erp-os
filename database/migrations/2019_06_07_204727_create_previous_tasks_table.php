<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_tasks', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('task')->unsigned();
            $table->bigInteger('previous_task')->unsigned();
            $table->foreign('task')->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->foreign('previous_task')->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_tasks');
    }
}
