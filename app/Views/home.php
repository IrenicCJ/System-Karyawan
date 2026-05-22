<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="text-center py-5">
    <h3>Sistem Informasi Karyawan</h3>
    <p class="text-muted">Aplikasi monolith CodeIgniter 4 untuk manajemen data karyawan dan departemen.</p>
    <a href="<?= base_url('karyawan') ?>" class="btn btn-primary">Data Karyawan</a>
    <a href="<?= base_url('departemen') ?>" class="btn btn-outline-secondary">Data Departemen</a>
</div>

<?= $this->endSection() ?>
