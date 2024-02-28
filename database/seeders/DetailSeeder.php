<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Penjualan 1
            [
                'penjualan_id' => 1,
                'barang_id' => 1, // Pensil
                'harga' => 1500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 2, // Penghapus
                'harga' => 800,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 3, // Buku Tulis
                'harga' => 2500,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Penjualan 2
            [
                'penjualan_id' => 2,
                'barang_id' => 4, // Pena
                'harga' => 2000,
                'jumlah' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 5, // Baterai AA
                'harga' => 3500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 6, // Sikat Gigi
                'harga' => 2000,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Penjualan 3
            [
                'penjualan_id' => 3,
                'barang_id' => 7, // Rautan
                'harga' => 800,
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 8, // Kabel USB
                'harga' => 2500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 9, // Sandal
                'harga' => 6000,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Penjualan 4
            [
                'penjualan_id' => 4,
                'barang_id' => 10, // Robot
                'harga' => 2500,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 5, // Baterai AA
                'harga' => 3500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 6, // Sikat Gigi
                'harga' => 2000,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],        
            // Penjualan 5
            [
                'penjualan_id' => 5,
                'barang_id' => 7, // Rautan
                'harga' => 800,
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 8, // Kabel USB
                'harga' => 2500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 9, // Sandal
                'harga' => 6000,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 6
            [
                'penjualan_id' => 6,
                'barang_id' => 1, // Pensil
                'harga' => 1500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 2, // Penghapus
                'harga' => 800,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 3, // Buku Tulis
                'harga' => 2500,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Penjualan 7
            [
                'penjualan_id' => 7,
                'barang_id' => 10, // Robot
                'harga' => 2500,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 5, // Baterai AA
                'harga' => 3500,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 6, // Sikat Gigi
                'harga' => 2000,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 8
            [
                'penjualan_id' => 8,
                'barang_id' => 1, // Pensil
                'harga' => 1500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 2, // Penghapus
                'harga' => 800,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 3, // Buku Tulis
                'harga' => 2500,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 9
            [
                'penjualan_id' => 9,
                'barang_id' => 10, // Robot
                'harga' => 2500,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 5, // Baterai AA
                'harga' => 3500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 6, // Sikat Gigi
                'harga' => 2000,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],        
        
            // Penjualan 10
            [
                'penjualan_id' => 10,
                'barang_id' => 1, // Pensil
                'harga' => 1500,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 2, // Penghapus
                'harga' => 800,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 3, // Buku Tulis
                'harga' => 2500,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('t_penjualan_detail')->insert( $data );
    }
}
