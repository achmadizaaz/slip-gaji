<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
       protected $fillable = [
        'employee_id',
        'periode',
        'gaji_pokok',
        'tunj_struktural',
        'tunj_fungsional',
        'tpp',
        'tunj_gelar',
        'bant_operasional',
        'tunj_keaktifan',
        'tunj_kesehatan',
        'honor_mengajar',
        'iuran_bpjs_ketenagakerjaan',
        'iuran_bpjs_kesehatan',
        'iuran_dplk',
        'upah_lembur',
        'simpanan_wajib',
        'pinjaman_koperasi',
        'pinjaman_bank',
        'pinjaman_lainnya',
        'total_pendapatan',
        'total_potongan',
        'gaji_bersih',
    ];


    // Auto hitung pendapatan, potongan, dan gaji bersih
    public function calculateTotals()
    {
        $pendapatan = $this->gaji_pokok + $this->tunj_struktural + $this->tunj_fungsional +
                      $this->tpp + $this->tunj_gelar + $this->bant_operasional +
                      $this->tunj_keaktifan + $this->tunj_kesehatan +
                      $this->honor_mengajar + $this->upah_lembur;

        $potongan   = $this->iuran_bpjs_ketenagakerjaan + $this->iuran_bpjs_kesehatan +
                      $this->iuran_dplk + $this->simpanan_wajib +
                      $this->pinjaman_koperasi + $this->pinjaman_bank +
                      $this->pinjaman_lainnya;

        $this->total_pendapatan = $pendapatan;
        $this->total_potongan   = $potongan;
        $this->gaji_bersih      = $pendapatan - $potongan;
    }
}
