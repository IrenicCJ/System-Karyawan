<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h4 class="mb-3"><?= esc($title) ?></h4>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <form action="<?= esc($aksi) ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Departemen</label>
                <input type="text" name="nama_departemen" class="form-control"
                       value="<?= old('nama_departemen', $data['nama_departemen'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control"
                       value="<?= old('lokasi', $data['lokasi'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('departemen') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
