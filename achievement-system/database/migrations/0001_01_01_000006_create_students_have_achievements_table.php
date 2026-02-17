<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students_have_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained(table:'users', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('achievement_id')->constrained(table:'achievements', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['student_id', 'achievement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_achievement');
    }
};
