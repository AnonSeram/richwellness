<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKamar extends Model
{
    use HasFactory;

    protected $table = 'data_kamar';

    protected $fillable = [
        'tipe_kamar',
        'jumlah_kamar',
        'jumlah_tersedia',
        'harga',
        'status'
    ];

    // Method utama untuk mengurangi jumlah tersedia
    public function kurangiJumlahKamar($jumlah)
    {
        $this->jumlah_tersedia -= $jumlah;

        if ($this->jumlah_tersedia <= 0) {
            $this->jumlah_tersedia = 0;
            $this->status = 'tidak_tersedia';
        }

        $this->save();
    }

    // Alias agar tidak error saat dipanggil sebagai "kurangJumlahKamar"
    public function kurangJumlahKamar($jumlah)
    {
        return $this->kurangiJumlahKamar($jumlah);
    }

    // Tambah jumlah tersedia
    public function tambahJumlahKamar($jumlah)
    {
        $this->jumlah_tersedia += $jumlah;

        if ($this->jumlah_tersedia > 0) {
            $this->status = 'tersedia';
        }

        $this->save();
    }

    // Ambil semua kamar yang tersedia
    public static function getKamarTersedia()
    {
        return self::where('status', 'tersedia')
            ->where('jumlah_tersedia', '>', 0)
            ->get();
    }

    // Total jumlah kamar tersedia
    public static function getTotalKamarTersedia()
    {
        return self::where('status', 'tersedia')
            ->where('jumlah_tersedia', '>', 0)
            ->sum('jumlah_tersedia');
    }
}
