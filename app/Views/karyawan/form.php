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
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="<?= old('nama', $data['nama'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="<?= old('email', $data['email'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control"
                       value="<?= old('jabatan', $data['jabatan'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Gaji</label>
                <input type="number" name="gaji" class="form-control"
                       value="<?= old('gaji', $data['gaji'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select name="departemen_id" class="form-select">
                    <option value="">-- Pilih Departemen --</option>
                    <?php foreach ($departemen as $d): ?>
                        <option value="<?= $d['id'] ?>"
                            <?= old('departemen_id', $data['departemen_id'] ?? '') == $d['id'] ? 'selected' : '' ?>>
                            <?= esc($d['nama_departemen']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('karyawan') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
