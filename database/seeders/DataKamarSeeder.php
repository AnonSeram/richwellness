<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataKamar;

class DataKamarSeeder extends Seeder
{
    public function run()
    {
        $kamarData = [
            [
                'tipe_kamar' => 'Luxury',
                'jumlah_kamar' => 100,
                'jumlah_tersedia' => 100,
                'harga' => 500000,
                'status' => 'tersedia'
            ],
            [
                'tipe_kamar' => 'Reguler',
                'jumlah_kamar' => 100,
                'jumlah_tersedia' => 100,
                'harga' => 350000,
                'status' => 'tersedia'
            ]
            
        ];

        foreach ($kamarData as $kamar) {
            DataKamar::create($kamar);
        }
    }
} 