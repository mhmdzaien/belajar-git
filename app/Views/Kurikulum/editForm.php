<?php $this->extend('Layouts/master') ?>

<?php $this->section('content') ?>
<div class="row mt-5">
    <div class="col">
        <?= form_open('kurikulum/edit/' . $kurikulum['id']); ?>
        <div class="card">
            <div class="card-header text-center">
                <h5>Tambah Kurikulum</h5>
            </div>
            <div class="card-body">
                <div class="form-group mt-2">
                    <label>Nama Kurikulum</label>
                    <input type="text" name="nama" value="<?= $kurikulum['nama'] ?>" class="form-control">
                </div>
                <?php if (validation_errors("nama")) : ?>
                    <div class="invalid-feedback d-block">
                        <?= validation_show_error("nama") ?>
                    </div>
                <?php endif; ?>
                <div class="form-group mt-2">
                    <label>Prodi</label>
                    <input type="number" name="prodi_id" value="<?= $kurikulum['prodi_id'] ?>" class="form-control">
                </div>
                <?php if (validation_errors("prodi_id")) : ?>
                    <div class="invalid-feedback d-block">
                        <?= validation_show_error("prodi_id") ?>
                    </div>
                <?php endif; ?>
                <div class="form-group mt-2">
                    <label>Status</label>
                    <input type="number" name="is_aktif" value="<?= $kurikulum['is_aktif'] ?>" class="form-control">
                </div>
                <?php if (validation_errors("is_aktif")) : ?>
                    <div class="invalid-feedback d-block">
                        <?= validation_show_error("is_aktif") ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer text-end">
                <a href="/kurikulum" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<?php $this->endSection() ?>