<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $waktu = date('Y-m-d H:i:s');

        $departemen = [
            ['nama_departemen' => 'Teknologi Informasi', 'lokasi' => 'Jakarta'],
            ['nama_departemen' => 'Keuangan',            'lokasi' => 'Bandung'],
            ['nama_departemen' => 'Sumber Daya Manusia', 'lokasi' => 'Surabaya'],
        ];
        $this->db->table('departemen')->insertBatch($departemen);

        $karyawan = [
            ['nama' => 'Andi Pratama',   'email' => 'andi@example.com',   'jabatan' => 'Software Engineer',  'gaji' => 9000000,  'departemen_id' => 1, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Budi Santoso',   'email' => 'budi@example.com',   'jabatan' => 'Network Engineer',   'gaji' => 8500000,  'departemen_id' => 1, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Citra Lestari',  'email' => 'citra@example.com',  'jabatan' => 'Staff Akuntansi',    'gaji' => 6500000,  'departemen_id' => 2, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Dewi Anggraini', 'email' => 'dewi@example.com',   'jabatan' => 'Finance Analyst',    'gaji' => 7200000,  'departemen_id' => 2, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Eko Nugroho',    'email' => 'eko@example.com',    'jabatan' => 'Recruiter',          'gaji' => 6000000,  'departemen_id' => 3, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Fitri Handayani','email' => 'fitri@example.com',  'jabatan' => 'HR Generalist',      'gaji' => 6800000,  'departemen_id' => 3, 'created_at' => $waktu, 'updated_at' => $waktu],
            ['nama' => 'Gilang Saputra', 'email' => 'gilang@example.com', 'jabatan' => 'DevOps Engineer',    'gaji' => 11000000, 'departemen_id' => 1, 'created_at' => $waktu, 'updated_at' => $waktu],
        ];
        $this->db->table('karyawan')->insertBatch($karyawan);
    }
}
