<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><?= esc($title) ?></h4>
    <a href="<?= base_url('karyawan/create') ?>" class="btn btn-primary">+ Tambah Karyawan</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered align-middle" id="tabel-karyawan" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
$(function () {
    $('#tabel-karyawan').DataTable({
        processing: true,
        serverSide: true, // pemrosesan data dilakukan di server
        ajax: {
            url: '<?= base_url('karyawan/datatable') ?>',
            type: 'POST'
        },
        columns: [
            { data: 'no',              orderable: false, searchable: false },
            { data: 'nama' },
            { data: 'email' },
            { data: 'jabatan' },
            { data: 'gaji' },
            { data: 'nama_departemen' },
            { data: 'aksi',            orderable: false, searchable: false }
        ],
        order: [[1, 'asc']],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/id.json'
        }
    });
});
</script>
<?= $this->endSection() ?>
