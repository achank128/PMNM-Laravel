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
        Schema::create('lop_mon_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('MaLop',255);
            $table->string('TenLop');
            $table->longText('MoTa');
            $table->integer('SoLuongSV');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lop_mon_hocs');
    }
};
