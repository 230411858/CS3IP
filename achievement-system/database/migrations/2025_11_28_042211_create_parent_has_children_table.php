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
        Schema::create('parent_has_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent')->constrained(table:'users', column:'id');
            $table->foreignId('child')->constrained(table:'users', column:'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_has_children');
    }
};
