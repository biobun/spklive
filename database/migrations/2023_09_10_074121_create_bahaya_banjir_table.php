<?php

use App\Models\Tanaman;
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
        Schema::create('bahaya_banjir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained()->cascadeOnDelete();
            $table->integer('value');
            $table->integer('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahaya_banjir');
    }
};
