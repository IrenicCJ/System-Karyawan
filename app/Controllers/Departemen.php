<?php

namespace App\Controllers;

use App\Models\DepartemenModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Departemen extends BaseController
{
    protected $departemenModel;

    public function __construct()
    {
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        return view('departemen/index', [
            'title'      => 'Data Departemen',
            'departemen' => $this->departemenModel->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function create()
    {
        return view('departemen/form', [
            'title' => 'Tambah Departemen',
            'aksi'  => base_url('departemen/store'),
            'data'  => null,
        ]);
    }

    public function store()
    {
        if (! $this->departemenModel->save($this->request->getPost())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->departemenModel->errors());
        }
        return redirect()->to('departemen')
            ->with('sukses', 'Departemen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->departemenModel->find($id);
        if (! $data) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('departemen/form', [
            'title' => 'Edit Departemen',
            'aksi'  => base_url('departemen/update/' . $id),
            'data'  => $data,
        ]);
    }

    public function update($id)
    {
        $payload       = $this->request->getPost();
        $payload['id'] = $id;

        if (! $this->departemenModel->save($payload)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->departemenModel->errors());
        }
        return redirect()->to('departemen')
            ->with('sukses', 'Departemen berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->departemenModel->delete($id);
        return redirect()->to('departemen')
            ->with('sukses', 'Departemen berhasil dihapus.');
    }
}
