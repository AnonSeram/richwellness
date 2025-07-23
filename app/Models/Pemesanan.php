<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'nama_tamu',
        'email',
        'no_hp',
        'nik',
        'tipe_kamar',
        'jumlah_kamar',
        'harga',
        'tgl_check_in',
        'tgl_check_out',
        'kode_booking',
        'status_pembayaran',
        'metode_pembayaran'
    ];

    protected $dates = [
        'tgl_check_in',
        'tgl_check_out'
    ];

    /**
     * Relasi ke model DataKamar
     * tipe_kamar di tabel pemesanan merujuk ke id di tabel data_kamar
     */
    public function dataKamar()
    {
        return $this->belongsTo(DataKamar::class, 'tipe_kamar', 'id');
    }

    /**
     * Accessor untuk mendapatkan nama tipe kamar
     * Digunakan dengan $pemesanan->nama_tipe_kamar
     */
    public function getNamaTipeKamarAttribute()
    {
        return $this->dataKamar ? $this->dataKamar->tipe_kamar : 'Tidak Diketahui';
    }

    /**
     * Accessor untuk mendapatkan harga per malam
     */
    public function getHargaPerMalamAttribute()
    {
        return $this->dataKamar ? $this->dataKamar->harga : 0;
    }

    /**
     * Accessor untuk menghitung jumlah malam
     */
    public function getJumlahMalamAttribute()
    {
        if ($this->tgl_check_in && $this->tgl_check_out) {
            return $this->tgl_check_in->diffInDays($this->tgl_check_out);
        }
        return 0;
    }

    /**
     * Scope untuk filter berdasarkan status pembayaran
     */
    public function scopeBelumBayar($query)
    {
        return $query->where('status_pembayaran', 'Belum Bayar');
    }

    public function scopeSudahBayar($query)
    {
        return $query->where('status_pembayaran', 'Sudah Bayar');
    }

    /**
     * Scope untuk filter berdasarkan email user
     */
    public function scopeByEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}

