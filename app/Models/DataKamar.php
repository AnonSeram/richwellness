<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    /**
     * Kurangi jumlah kamar yang tersedia.
     *
     * @param int $jumlah
     * @throws \Exception
     * @return void
     */
    public function kurangiJumlahKamar($jumlah)
    {
        if ($jumlah <= 0) {
            throw new \InvalidArgumentException("Jumlah yang dikurangi harus lebih dari 0.");
        }

        if ($this->jumlah_tersedia < $jumlah) {
            throw new \Exception("Jumlah kamar tersedia tidak mencukupi.");
        }

        $this->jumlah_tersedia -= $jumlah;

        if ($this->jumlah_tersedia <= 0) {
            $this->status = 'tidak_tersedia';
        }

        $this->save();
    }

    /**
     * Tambah jumlah kamar yang tersedia.
     *
     * @param int $jumlah
     * @return void
     */
    public function tambahJumlahKamar($jumlah)
    {
        if ($jumlah <= 0) {
            throw new \InvalidArgumentException("Jumlah yang ditambah harus lebih dari 0.");
        }

        $this->jumlah_tersedia += $jumlah;

        if ($this->jumlah_tersedia > 0) {
            $this->status = 'tersedia';
        }

        $this->save();
    }

    /**
     * Ambil semua kamar yang tersedia.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getKamarTersedia()
    {
        return self::where('status', 'tersedia')
                    ->where('jumlah_tersedia', '>', 0)
                    ->get();
    }

    /**
     * Ambil total kamar tersedia (jumlah keseluruhan).
     *
     * @return int
     */
    public static function getTotalKamarTersedia()
    {
        return self::where('status', 'tersedia')
                    ->where('jumlah_tersedia', '>', 0)
                    ->sum('jumlah_tersedia');
    }
}
