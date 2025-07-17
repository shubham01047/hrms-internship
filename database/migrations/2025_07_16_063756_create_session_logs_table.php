<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSessionLogsTable extends Migration
{
    public function up()
    {
        Schema::create('session_logs', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->unsignedInteger('user_id')->nullable()->index(); // user_id with index
            $table->dateTime('login_time')->nullable();
            $table->dateTime('logout_time')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('device_info')->nullable();

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable(); // deleted_at column
        });
    }

    public function down()
    {
        Schema::dropIfExists('session_logs');
    }
}
