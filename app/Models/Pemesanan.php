<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan'; // Sesuaikan dengan nama tabel Anda
    
    protected $fillable = [
        'nama_tamu',
        'email',
        'no_hp',
        'nik',
        'tipe_kamar',
        'jumlah_kamar',
        'harga',
        'tgl_check_in',
        'tgl_check_out'
    ];

    // Jika Anda ingin mengakses tgl_check_in dan tgl_check_out sebagai Carbon instance
    protected $dates = [
        'tgl_check_in',
        'tgl_check_out'
    ];

    // Relasi ke user (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    // Hitung jumlah malam menginap
    public function getDurasiAttribute()
    {
        $check_in = \Carbon\Carbon::parse($this->tgl_check_in);
        $check_out = \Carbon\Carbon::parse($this->tgl_check_out);
        return $check_in->diffInDays($check_out);
    }

    // Format harga
    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function rating()   
    {
        return $this->hasOne(Rating::class);
    }

}