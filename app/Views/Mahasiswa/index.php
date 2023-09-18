<?= $this->extend('Layouts/master'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="responsive-table">
        <div class="card-header card-title border-light text-center mb-3">
            <h1 class="mb-0">Table Mahasiswa</h1>
        </div>
        <div class="card-body">
            <div class="col-4">
                <a href="/mahasiswa/formTambah" class="btn btn-success mb-3">
                    Tambah Data Mahasiswa
                </a>
            </div>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $m) : ?>
                        <tr>
                            <td class="text-center"><?= $i; ?></td>
                            <td><?= $m['nim']; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['semester_masuk']; ?></td>
                            <td><?= $m['jenis_kelamin']; ?></td>
                            <td><?= $m['prodi_id'] ?></td>
                            <td class="text-center">
                                <a href="/mahasiswa/formEdit/<?= $m['nim']; ?>" class="btn btn-warning text-white">
                                    Edit
                                </a>
                                <a href="/mahasiswa/delete/<?= $m['nim'] ?>" class="btn btn-danger text-white">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>