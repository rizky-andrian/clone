<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brand_produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_brand');
            $table->string('slugs')->unique();
            $table->text('deskripsi_brand')->nullable();
            $table->string('gambar_brand')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_produk');
    }
};
