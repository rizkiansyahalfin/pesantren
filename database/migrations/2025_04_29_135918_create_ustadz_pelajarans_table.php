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
        Schema::create('ustadz_pelajarans', function (Blueprint $table) {
            $table->foreignId('ustadz_id')->constrained()->onDelete('cascade');
            $table->foreignId('pelajaran_id')->constrained()->onDelete('cascade');
            $table->primary(['ustadz_id', 'pelajaran_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ustadz_pelajarans');
    }
};
