<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Pensil',
                'harga_beli' => 1000,
                'harga_jual' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Penghapus',
                'harga_beli' => 500,
                'harga_jual' => 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Pena',
                'harga_beli' => 1500,
                'harga_jual' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Baterai AA',
                'harga_beli' => 3000,
                'harga_jual' => 3500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Sikat Gigi',
                'harga_beli' => 1500,
                'harga_jual' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Rautan',
                'harga_beli' => 500,
                'harga_jual' => 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Kabel USB',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Sandal',
                'harga_beli' => 5000,
                'harga_jual' => 6000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Robot',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
