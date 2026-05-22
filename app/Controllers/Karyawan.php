<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\DepartemenModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Karyawan extends BaseController
{
    protected $karyawanModel;
    protected $departemenModel;

    public function __construct()
    {
        $this->karyawanModel   = new KaryawanModel();
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        return view('karyawan/index', ['title' => 'Data Karyawan']);
    }

    /**
     * Endpoint AJAX yang dipanggil DataTables (server-side processing).
     * Mengembalikan JSON sesuai format yang diharapkan DataTables.
     */
    public function datatable()
    {
        $request = $this->request;

        $draw   = (int) $request->getPost('draw');
        $start  = (int) $request->getPost('start');
        $length = (int) $request->getPost('length');
        $keyword = $request->getPost('search')['value'] ?? '';

        $order   = $request->getPost('order');
        $kolomKe = (int) ($order[0]['column'] ?? 0);
        $arah    = $order[0]['dir'] ?? 'asc';

        $data = $this->karyawanModel->getDatatable($start, $length, $keyword, $kolomKe, $arah);

        $no   = $start + 1;
        $baris = [];
        foreach ($data as $row) {
            $baris[] = [
                'no'              => $no++,
                'nama'            => esc($row['nama']),
                'email'           => esc($row['email']),
                'jabatan'         => esc($row['jabatan']),
                'gaji'            => 'Rp ' . number_format((float) $row['gaji'], 0, ',', '.'),
                'nama_departemen' => esc($row['nama_departemen']),
                'aksi'            => $this->tombolAksi($row['id']),
            ];
        }

        return $this->response->setJSON([
            'draw'            => $draw,
            'recordsTotal'    => $this->karyawanModel->hitungSemua(),
            'recordsFiltered' => $this->karyawanModel->hitungTerfilter($keyword),
            'data'            => $baris,
        ]);
    }

    private function tombolAksi($id): string
    {
        $edit  = base_url('karyawan/edit/' . $id);
        $hapus = base_url('karyawan/delete/' . $id);

        return '<a href="' . $edit . '" class="btn btn-sm btn-warning">Edit</a> '
            . '<a href="' . $hapus . '" class="btn btn-sm btn-danger" '
            . 'onclick="return confirm(\'Yakin hapus data ini?\')">Hapus</a>';
    }

    public function create()
    {
        return view('karyawan/form', [
            'title'      => 'Tambah Karyawan',
            'aksi'       => base_url('karyawan/store'),
            'data'       => null,
            'departemen' => $this->departemenModel->findAll(),
        ]);
    }

    public function store()
    {
        if (! $this->karyawanModel->save($this->request->getPost())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->karyawanModel->errors());
        }
        return redirect()->to('karyawan')
            ->with('sukses', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->karyawanModel->find($id);
        if (! $data) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('karyawan/form', [
            'title'      => 'Edit Karyawan',
            'aksi'       => base_url('karyawan/update/' . $id),
            'data'       => $data,
            'departemen' => $this->departemenModel->findAll(),
        ]);
    }

    public function update($id)
    {
        $payload       = $this->request->getPost();
        $payload['id'] = $id;

        if (! $this->karyawanModel->save($payload)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->karyawanModel->errors());
        }
        return redirect()->to('karyawan')
            ->with('sukses', 'Data karyawan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->karyawanModel->delete($id);
        return redirect()->to('karyawan')
            ->with('sukses', 'Data karyawan berhasil dihapus.');
    }
}
