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

    public function kurangiJumlahKamar($jumlah)
    {
        $this->jumlah_tersedia -= $jumlah;
        if ($this->jumlah_tersedia <= 0) {
            $this->status = 'tidak_tersedia';
        }
        $this->save();
    }

    public function tambahJumlahKamar($jumlah)
    {
        $this->jumlah_tersedia += $jumlah;
        if ($this->jumlah_tersedia > 0) {
            $this->status = 'tersedia';
        }
        $this->save();
    }

    public static function getKamarTersedia()
    {
        return self::where('status', 'tersedia')
                  ->where('jumlah_tersedia', '>', 0)
                  ->get();
    }

    public static function getTotalKamarTersedia()
    {
        return self::where('status', 'tersedia')
                  ->where('jumlah_tersedia', '>', 0)
                  ->sum('jumlah_tersedia');
    }
}
