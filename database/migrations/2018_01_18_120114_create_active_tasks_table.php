<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_hire_id');
            $table->integer('task_list_id');
            $table->integer('task_id');
            $table->string('task_name');
            $table->text('task_details');
            $table->boolean('complete')->default(0);
            $table->timestamp('completed_on')->nullable();
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
        Schema::dropIfExists('active_tasks');
    }
}
