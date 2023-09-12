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
        Schema::create('input_data', function (Blueprint $table) {
            $table->id();
            $table->float('suhu')->default(0);
            $table->float('curah_hujan')->default(0);
            $table->float('kelembapan')->default(0);
            $table->string('drainase')->default('');
            $table->string('tekstur')->default('');
            $table->float('kedalaman_tanah')->default(0);
            $table->float('keasaman')->default(0);
            $table->float('lereng')->default(0);
            $table->string('banjir_dalam')->default('');
            $table->string('banjir_lama')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_data');
    }
};
