<?php $this->extend('Layouts/master'); ?>

<?php $this->section('content'); ?>

<?php

$errors = session()->getFlashData('validator');

?>

<div class="container">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header border-light">
                <h1 class="text-center">Ubah Data Mahasiswa</h1>
            </div>
            <form action="/mahasiswa/save" method="post">
                <div class="card-body border-light">
                    <input type="number" name="isNew" id="isNew" value="0" hidden>
                    <div class="input-group mb-3">
                        <input type="text" readonly="readonly" class="form-control <?= empty($errors['nim']) ? '' : 'is-invalid'; ?>" placeholder="NIM" name="nim" value="<?= old('nim') ?? $mahasiswa['nim']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nim'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['nama']) ? '' : 'is-invalid'; ?>" placeholder="Nama" name="nama" value="<?= old('nama') ?? $mahasiswa['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['semester_masuk']) ? '' : 'is-invalid'; ?>" placeholder="Angkatan" name="semester_masuk" value="<?= old('semester_masuk') ?? $mahasiswa['semester_masuk']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['semester_masuk'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <select class="form-select <?= empty($errors['prodi_id']) ? '' : 'is-invalid'; ?>" id="prodi_id" name="prodi_id">
                                <option value="" disabled>Pilih...</option>
                                <?php foreach ($listProdi as $p) : ?>
                                    <option <?= $p['id'] == ($mahasiswa['prodi_id'] ?? old('id')) ? 'selected' : ''; ?> value="<?= $p['id']; ?>"><?= $p['jenjang'] . ' ' . $p['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="input-group-text" for="prodi_id">Program Studi</label>
                            <div class="invalid-feedback">
                                <?= $errors['prodi_id'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 pt-0 mb-2 ">
                            <span class="text-gray-900 mb-2 font-weight-bold ">Jenis Kelamin</span>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P" <?= $mahasiswa['jenis_kelamin'] == "P" ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" <?= $mahasiswa['jenis_kelamin'] == "L" ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Laki">Laki - Laki</label>
                        </div>
                        <div class="text-danger">
                            <?= $errors['jenis_kelamin'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="card-footer border-light d-flex justify-content-between">
                        <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>