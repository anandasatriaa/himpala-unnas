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
        Schema::create('buku_tamu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('telpon_organisasi')->nullable();
            $table->string('sosmed_organisasi')->nullable();
            $table->string('asal_instansi')->nullable();
            $table->date('tanggal_berkunjung');
            $table->text('tujuan')->nullable();
            $table->string('nama_tamu')->nullable();
            $table->text('alamat_organisasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_tamu');
    }
};
