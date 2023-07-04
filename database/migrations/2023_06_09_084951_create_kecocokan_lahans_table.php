<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kriteria;
use App\Models\Tanaman;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kecocokan_lahans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tanaman::class)->nullable();
            $table->foreignIdFor(Kriteria::class)->nullable();
            $table->string('kecocokan');
            $table->string('value');
            $table->string('value_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecocokan_lahans');
    }
};
