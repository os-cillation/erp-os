<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTrackingEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tracking_entries', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->longText('text');
            $table->time('amount');
            $table->bigInteger('user')->unsigned();
            $table->bigInteger('task')->unsigned();
            $table->enum('state', ['open', 'closed']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('task')->references('id')->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tracking_entries');
    }
}
