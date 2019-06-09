<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->unsigned();
            $table->string('name', 120);
            $table->longText('description')->nullable();
            $table->bigInteger('project')->unsigned();
            $table->foreign('project')->references('id')->on('projects')
                ->onDelete('cascade');
            $table->enum('state', ['open', 'closed']);
            $table->time('planned_amount')->nullable();
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users')
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
        Schema::dropIfExists('tasks');
    }
}
