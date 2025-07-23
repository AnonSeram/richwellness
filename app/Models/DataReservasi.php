<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataReservasi extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['nama_tamu', 'email', 'no_hp', 'nik', 'tipe_kamar', 'jumlah_kamar', 'tgl_check_in', 'tgl_check_out','harga', 'kode_booking','status_pembayaran'];
   
    public function rating()
{
    return $this->hasOne(Rating::class, 'pemesanan_id');
}

    public function dataKamar()
    {
        return $this->belongsTo(DataKamar::class, 'tipe_kamar', 'id');
    }

    // Accessor untuk mendapatkan nama tipe kamar
    public function getNamaTipeKamarAttribute()
    {
        return $this->dataKamar ? $this->dataKamar->tipe_kamar : 'Tidak Diketahui';
    }

}

