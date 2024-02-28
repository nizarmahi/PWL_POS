<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'kategori_kode' => 'KTG001',
                'kategori_nama' => 'Alat Tulis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'KTG002',
                'kategori_nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'KTG003',
                'kategori_nama' => 'Peralatan Rumah Tangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'KTG004',
                'kategori_nama' => 'Mainan',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'kategori_kode' => 'KTG005',
                'kategori_nama' => 'Fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ]  
        ];
        DB::table('m_kategori')->insert($data);
    }
}
