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
        Schema::create('student_has_classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained(table:'students', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->constrained(table:'classrooms', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->index(['student_id', 'classroom_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_classrooms');
    }
};
