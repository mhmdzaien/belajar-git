<?php $this->extend('Layouts/master'); ?>

<?php $this->section('content'); ?>

<?php

$errors = session()->getFlashData('validator');

?>

<div class="container">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header border-light">
                <h1 class="text-center">Tambah Data Mahasiswa</h1>
            </div>
            <form action="/mahasiswa/save" method="post">
                <input type="text" name="isNew" id="isNew" hidden value="1">
                <div class="card-body border-light">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['nim']) ? '' : 'is-invalid'; ?>" placeholder="NIM" name="nim" value="<?= old('nim'); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $errors['nim'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['nama']) ? '' : 'is-invalid'; ?>" placeholder="Nama" name="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['semester_masuk']) ? '' : 'is-invalid'; ?>" placeholder="Angkatan" name="semester_masuk" value="<?= old('semester_masuk'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['semester_masuk'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= empty($errors['jenis_kelamin']) ? '' : 'is-invalid'; ?>" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['jenis_kelamin'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <select class="form-select <?= empty($errors['prodi_id']) ? '' : 'is-invalid'; ?>" id="prodi_id" name="prodi_id">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="1">Ilmu Komputer</option>
                                <option value="2">Teknologi Infomatika</option>
                                <option value="3">Matematika</option>
                            </select>
                            <label class="input-group-text" for="prodi_id">Program Studi</label>
                            <div class="invalid-feedback">
                                <?= $errors['prodi_id'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-light d-flex justify-content-between">
                    <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>