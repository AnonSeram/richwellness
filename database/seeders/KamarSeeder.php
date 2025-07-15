<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Luxury Room (misal 10 kamar)
        for ($i = 1; $i <= 10; $i++) {
            DB::table('kamar')->insert([
                'nomor_kamar' => 'LUX' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipe_kamar' => 'Luxury',
                'status' => 'tersedia',
                'keterangan' => 'Kamar luxury dengan fasilitas premium',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Reguler Room (misal 15 kamar)
        for ($i = 1; $i <= 15; $i++) {
            DB::table('kamar')->insert([
                'nomor_kamar' => 'REG' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipe_kamar' => 'Reguler',
                'status' => 'tersedia',
                'keterangan' => 'Kamar reguler dengan fasilitas standar',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
