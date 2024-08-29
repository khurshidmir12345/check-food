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
        Schema::create('sabzavotlar_taomlar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sabzavotlar_id'); // Make sure this column name is correct
            $table->unsignedBigInteger('taomlar_id');     // Make sure this column name is correct
            $table->foreign('sabzavotlar_id')->references('id')->on('sabzavotlars')->onDelete('cascade');
            $table->foreign('taomlar_id')->references('id')->on('taomlars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sabzavot_taom');
    }
};
