<?php $this->extend('Layouts/master') ?>

<?php $this->section('content') ?>
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h5>Daftar Kurikulum</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td width="5%">ID</td>
                            <td>Nama</td>
                            <td>Prodi</td>
                            <td>Status</td>
                            <td width="15%" class="text-center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listKurikulum as $kurikulum) : ?>
                            <tr>
                                <td><?= $kurikulum['id'] ?></td>
                                <td><?= $kurikulum['nama'] ?></td>
                                <td><?= $kurikulum['prodi_id'] ?></td>
                                <td><?= $kurikulum['is_aktif'] ?></td>
                                <td class="text-center">
                                    <a href="\kurikulum\edit\<?= $kurikulum['id']?>" class="btn btn-primary">Edit</a>
                                    <a href="\kurikulum\delete\<?= $kurikulum['id'] ?>" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="fixed-bottom m-4 text-end">
    <a href="<?= base_url('kurikulum/add') ?>" class="btn btn-success shadow">Add Kurikulum</a>
</div>
<?= $this->endSection() ?>