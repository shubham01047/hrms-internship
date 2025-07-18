<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->unsignedInteger('user_id')->nullable()->index(); // Foreign key reference (nullable)
            $table->text('message')->nullable();
            $table->boolean('is_read')->default(0); // tinyint(1) default 0

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable(); // deleted_at column
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
