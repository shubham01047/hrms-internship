<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('company_description')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_default_colour')->nullable();
            $table->string('system_title')->default('HRMS');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable(); // deleted_at column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('company_profile');
    }
}
