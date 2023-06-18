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
        Schema::create('bomons', function (Blueprint $table) {
            $table->id();
            $table->string('mabomon',50);
            $table->string('tenbomon',255);
            $table->longText('mota');
            $table->string('vanphong',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bomons');
    }
};