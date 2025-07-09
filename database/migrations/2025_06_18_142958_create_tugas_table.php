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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('ID Pengguna yang membuat Tugas');
            $table->string('judul')->comment('Judul Tugas');
            $table->dateTime('ingatkan_pada')->nullable()->comment('Tanggal dan Waktu Pengingat Tugas');
            $table->text('deskripsi')->nullable()->comment('Deskripsi Tugas');
            $table->dateTime('deadline')->comment('Tanggal dan Waktu Deadline Tugas');
            $table->boolean('selesai')->default(false)->comment('Status Selesai Tugas');
            $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade')->comment('ID Mata Kuliah terkait Tugas');
            $table->foreignId('kategori_id')->nullable()->constrained()->onDelete('set null')->comment('ID Kategori terkait Tugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }

};
