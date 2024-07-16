<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKamar extends Model
{
    use HasFactory;
    protected $table = 'data_kamar';
    protected $fillable = ['tipe_kamar', 'jumlah_kamar', 'harga'];

    public function kurangiJumlahKamar($jumlah)
    {
        $this->jumlah_kamar -= $jumlah;
        $this->save();
    }
}
