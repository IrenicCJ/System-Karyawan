<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table         = 'departemen';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama_departemen', 'lokasi'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'nama_departemen' => 'required|min_length[3]|max_length[100]',
        'lokasi'          => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama_departemen' => [
            'required'   => 'Nama departemen wajib diisi.',
            'min_length' => 'Nama departemen minimal 3 karakter.',
        ],
        'lokasi' => [
            'required' => 'Lokasi wajib diisi.',
        ],
    ];
}
