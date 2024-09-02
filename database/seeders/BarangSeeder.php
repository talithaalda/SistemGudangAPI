<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangs = [
            [
                'nama_barang' => 'Laptop Dell Inspiron',
                'kode' => 'LDI001',
                'kategori' => 'Elektronik',
                'lokasi' => 'Gudang A',
                'kondisi' => 'Baru',
                'merk' => 'Dell',
                'jumlah' => 10
            ],
            [
                'nama_barang' => 'Printer Canon Pixma',
                'kode' => 'PCP002',
                'kategori' => 'Elektronik',
                'lokasi' => 'Gudang B',
                'kondisi' => 'Baru',
                'merk' => 'Canon',
                'jumlah' => 5
            ],
            [
                'nama_barang' => 'Meja Kerja Kayu',
                'kode' => 'MKK003',
                'kategori' => 'Furniture',
                'lokasi' => 'Gudang C',
                'kondisi' => 'Bekas',
                'merk' => 'Ikea',
                'jumlah' => 3
            ],
            [
                'nama_barang' => 'Kursi Kantor',
                'kode' => 'KK004',
                'kategori' => 'Furniture',
                'lokasi' => 'Gudang C',
                'kondisi' => 'Bekas',
                'merk' => 'Herman Miller',
                'jumlah' => 3
            ],
            [
                'nama_barang' => 'Monitor Samsung',
                'kode' => 'MS005',
                'kategori' => 'Elektronik',
                'lokasi' => 'Gudang D',
                'kondisi' => 'Baru',
                'merk' => 'Samsung',
                'jumlah' => 2
            ],

        ];
        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
