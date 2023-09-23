<?= $this->extend('Layouts/master') ?>

<?= $this->section('content') ?>


<div class="row mt-3">
    <div class="col">
        <?= form_open(base_url("semester/edit/" . $semester['id'])); ?>
        <div class="card">
            <div class="card-header bg-dark">
                <div class="card-title text-light text-center h4">Edit Pengguna</div>
            </div>
            <div class="card-body">
                <div class="form-group mt-2">
                    <label>Id</label>
                    <input type="text" name="id" value="<?= set_value("id", $semester['id']) ?>" class="form-control" />
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="invalid-feedback d-block">
                            <?= session('errors.id') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-2">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?= set_value("nama", $semester['nama']) ?>" class="form-control" />
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="invalid-feedback d-block">
                            <?= session('errors.nama') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-2">
                    <label>Jenis</label>
                    <input type="number" name="jenis" value="<?= set_value("jenis", $semester['jenis']) ?>" class="form-control" />
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="invalid-feedback d-block">
                            <?= session('errors.jenis') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection() ?>