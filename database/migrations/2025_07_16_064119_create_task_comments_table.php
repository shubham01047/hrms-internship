<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTaskCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('task_comments', function (Blueprint $table) {
            $table->increments('id'); // Primary key

            $table->unsignedInteger('task_id')->nullable()->index(); // Index for task_id
            $table->unsignedInteger('user_id')->nullable()->index(); // Index for user_id

            $table->text('comment')->nullable();

            $table->dateTime('commented_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->dateTime('deleted_at')->nullable(); // deleted_at column
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_comments');
    }
}
