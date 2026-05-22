<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><?= esc($title) ?></h4>
    <a href="<?= base_url('departemen/create') ?>" class="btn btn-primary">+ Tambah Departemen</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama Departemen</th>
                    <th>Lokasi</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($departemen as $d): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($d['nama_departemen']) ?></td>
                        <td><?= esc($d['lokasi']) ?></td>
                        <td>
                            <a href="<?= base_url('departemen/edit/' . $d['id']) ?>"
                               class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('departemen/delete/' . $d['id']) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin hapus departemen ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($departemen)): ?>
                    <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
