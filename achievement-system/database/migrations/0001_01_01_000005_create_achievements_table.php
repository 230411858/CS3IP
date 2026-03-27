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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['badge', 'medal', 'trophy'])->default('badge');
            $table->string('primary_colour')->default('#939400');
            $table->string('secondary_colour')->default('#7a5a00');
            $table->string('title');
            $table->string('description', 1023)->nullable();
            $table->foreignId('teacher_id')->constrained(table:'users', column:'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
