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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->nullable();   // Nomor Induk Pegawai
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('email')->unique()->nullable();
            $table->enum('status_kepegawaian', ['Tetap', 'Kontrak', 'Honorer'])->default('Tetap');
            $table->decimal('gaji_pokok', 15, 2)->default(0); // default gaji pokok bisa diset di sini
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
