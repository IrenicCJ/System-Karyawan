<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table         = 'karyawan';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama', 'email', 'jabatan', 'gaji', 'departemen_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama'          => 'required|min_length[3]|max_length[100]',
        'email'         => 'required|valid_email|max_length[100]',
        'jabatan'       => 'required|max_length[100]',
        'gaji'          => 'required|numeric',
        'departemen_id' => 'required|integer',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama wajib diisi.',
            'min_length' => 'Nama minimal 3 karakter.',
        ],
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
        ],
        'jabatan' => [
            'required' => 'Jabatan wajib diisi.',
        ],
        'gaji' => [
            'required' => 'Gaji wajib diisi.',
            'numeric'  => 'Gaji harus berupa angka.',
        ],
        'departemen_id' => [
            'required' => 'Departemen wajib dipilih.',
        ],
    ];

    /**
     * Urutan kolom mengikuti urutan kolom pada tabel di sisi front-end.
     * Dipakai untuk menentukan kolom mana yang diurutkan oleh DataTables.
     */
    private $kolomDatatable = ['k.id', 'k.nama', 'k.email', 'k.jabatan', 'k.gaji', 'd.nama_departemen'];

    /**
     * Query dasar: menggabungkan tabel karyawan dengan departemen (JOIN).
     */
    private function queryDasar()
    {
        return $this->db->table('karyawan k')
            ->select('k.id, k.nama, k.email, k.jabatan, k.gaji, d.nama_departemen')
            ->join('departemen d', 'd.id = k.departemen_id');
    }

    /**
     * Menerapkan filter pencarian ke beberapa kolom sekaligus.
     */
    private function terapkanPencarian($builder, string $keyword)
    {
        if ($keyword !== '') {
            $builder->groupStart()
                ->like('k.nama', $keyword)
                ->orLike('k.email', $keyword)
                ->orLike('k.jabatan', $keyword)
                ->orLike('d.nama_departemen', $keyword)
                ->groupEnd();
        }
        return $builder;
    }

    /**
     * Mengambil data karyawan untuk satu halaman DataTables.
     */
    public function getDatatable(int $start, int $length, string $keyword, int $kolomKe, string $arah): array
    {
        $builder = $this->terapkanPencarian($this->queryDasar(), $keyword);

        $kolom = $this->kolomDatatable[$kolomKe] ?? 'k.id';
        $builder->orderBy($kolom, $arah);
        $builder->limit($length, $start);

        return $builder->get()->getResultArray();
    }

    /**
     * Total seluruh baris (tanpa filter pencarian).
     */
    public function hitungSemua(): int
    {
        return $this->db->table('karyawan')->countAllResults();
    }

    /**
     * Total baris setelah filter pencarian diterapkan.
     */
    public function hitungTerfilter(string $keyword): int
    {
        $builder = $this->terapkanPencarian($this->queryDasar(), $keyword);
        return $builder->countAllResults();
    }
}
