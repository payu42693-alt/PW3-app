<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional, Laravel otomatis menebak "mahasiswas")
     */
    protected $table = 'mahasiswas';

    /**
     * Kolom yang boleh diisi secara mass assignment
     */
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'program_studi',
        'no_hp',
        'email',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
