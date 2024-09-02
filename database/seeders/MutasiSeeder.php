<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangIds = Barang::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $mutasis = [
            [
                'user_id' => $userIds[array_rand($userIds)],
                'barang_id' => $barangIds[array_rand($barangIds)],
                'tanggal' => Carbon::now()->subDays(10)->toDateString(),
                'jenis_mutasi' => 'Masuk',
                'jumlah' => '5',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'barang_id' => $barangIds[array_rand($barangIds)],
                'tanggal' => Carbon::now()->subDays(5)->toDateString(),
                'jenis_mutasi' => 'Keluar',
                'jumlah' => '2',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'barang_id' => $barangIds[array_rand($barangIds)],
                'tanggal' => Carbon::now()->subDays(1)->toDateString(),
                'jenis_mutasi' => 'Masuk',
                'jumlah' => '10',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'barang_id' => $barangIds[array_rand($barangIds)],
                'tanggal' => Carbon::now()->toDateString(),
                'jenis_mutasi' => 'Keluar',
                'jumlah' => '1',
                'status' => 'Tersedia'
            ],
        ];
        foreach ($mutasis as $mutasi) {
            Mutasi::create($mutasi);
        }
    }
}
