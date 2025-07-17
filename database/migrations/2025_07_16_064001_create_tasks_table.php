<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id'); // Primary key

            $table->unsignedInteger('project_id')->nullable()->index();
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();

            $table->unsignedInteger('assigned_to')->nullable()->index();

            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent'])->default('Medium');
            $table->enum('status', ['To-Do', 'In Progress', 'On Hold', 'Done'])->default('To-Do');

            $table->date('due_date')->nullable();

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable(); // deleted_at column
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
