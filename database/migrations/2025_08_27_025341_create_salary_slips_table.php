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
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // relasi ke tabel karyawan
            $table->string('periode'); // contoh: 08-2025
            $table->decimal('gaji_pokok', 15, 2)->default(0);
            $table->decimal('tunj_struktural', 15, 2)->default(0);
            $table->decimal('tunj_fungsional', 15, 2)->default(0);
            $table->decimal('tpp', 15, 2)->default(0);
            $table->decimal('tunj_gelar', 15, 2)->default(0);
            $table->decimal('bant_operasional', 15, 2)->default(0);
            $table->decimal('tunj_keaktifan', 15, 2)->default(0);
            $table->decimal('tunj_kesehatan', 15, 2)->default(0);
            $table->decimal('honor_mengajar', 15, 2)->default(0);
            $table->decimal('upah_lembur', 15, 2)->default(0);

            // Cost
            $table->decimal('iuran_bpjs_ketenagakerjaan', 15, 2)->default(0);
            $table->decimal('iuran_bpjs_kesehatan', 15, 2)->default(0);
            $table->decimal('iuran_dplk', 15, 2)->default(0);
            $table->decimal('simpanan_wajib', 15, 2)->default(0);
            $table->decimal('pinjaman_koperasi', 15, 2)->default(0);
            $table->integer('angsuran_koperasi_ke')->default(0);
            $table->decimal('pinjaman_bank', 15, 2)->default(0);
            $table->integer('angsuran_bank_ke')->default(0);
            $table->decimal('pinjaman_lainnya', 15, 2)->default(0);

            // total otomatis bisa dihitung, tapi kita simpan juga untuk efisiensi
            $table->decimal('total_pendapatan', 15, 2)->default(0);
            $table->decimal('total_potongan', 15, 2)->default(0);
            $table->decimal('gaji_bersih', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
