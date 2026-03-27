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
        Schema::create('students_have_friends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained(table:'users', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('friend_id')->constrained(table:'users', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('pending')->default(true);
            $table->timestamps();
            $table->unique(['student_id', 'friend_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_have_friends');
    }
};
