<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->increments('id'); // Primary key

            $table->unsignedInteger('user_id')->nullable()->index(); // user_id with index
            $table->unsignedInteger('task_id')->nullable()->index(); // task_id with index

            $table->date('date')->nullable();
            $table->decimal('hours_worked', 5, 2)->nullable(); // e.g. 8.50 hours
            $table->text('description')->nullable();

            $table->enum('status', ['Submitted', 'Approved', 'Rejected'])->default('Submitted');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->dateTime('deleted_at')->nullable(); // deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
