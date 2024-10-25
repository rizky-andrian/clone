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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('slugs')->unique();
            $table->string('satuan_produk');
            $table->string('kondisi_produk');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_brand');
            $table->double('harga_produk')->nullable();
            $table->boolean('on_stok')->default(true);
            $table->integer('stok_produk');
            $table->text('deskripsi_produk')->nullable();
            $table->timestamps();


            // deklare relation table
            $table->foreign('id_kategori')->references('id')->on('kategori_produk')->onDelete('CASCADE');
            $table->foreign('id_brand')->references('id')->on('brand_produk')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
