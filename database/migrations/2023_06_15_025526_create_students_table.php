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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('MSSV');
            $table->string('HoTen');
            $table->boolean('GioiTinh')->nullable();
            $table->dateTime('NgaySinh')->nullable();
            $table->longtext('DiaChi')->nullable();
            $table->string('SDT')->nullable();
            $table->integer('MaLop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};