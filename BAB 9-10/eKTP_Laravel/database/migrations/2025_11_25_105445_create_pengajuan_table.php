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
            Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id_pengajuan');
            $table->string('nama');
            $table->string('nik', 20);
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->string('foto_kk')->nullable();
            $table->enum('status', ['pending','diterima','ditolak'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
