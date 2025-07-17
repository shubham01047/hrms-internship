<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('breaks', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY
            $table->unsignedBigInteger('attendance_id')->nullable();
            $table->string('break_type', 50)->nullable();
            $table->dateTime('break_start')->nullable();
            $table->dateTime('break_end')->nullable();

            // Custom timestamps
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Soft delete
            $table->dateTime('deleted_at')->nullable();

            // Index & FK
            $table->index('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendance')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('breaks');
    }
};
