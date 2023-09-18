<?php $this->extend('Layouts/master'); ?>

<?php $this->section('content'); ?>

<?php

$errors = session()->getFlashData('validator');
$prodi = [
    ['id' => 1, 'jenjang' => 'S1', 'nama' => 'Ilmu Komputer'], 
    ['id' => 2, 'jenjang' => 'S1', 'nama' => 'Teknik Informatika'], 
    ['id' => 3, 'jenjang' => 'S1', 'nama' => 'Matematika']
]

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
                        <input type="text" class="form-control <?= empty($errors['jenis_kelamin']) ? '' : 'is-invalid'; ?>" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin') ?? $mahasiswa['jenis_kelamin']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['jenis_kelamin'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <select class="form-select <?= empty($errors['prodi_id']) ? '' : 'is-invalid'; ?>" id="prodi_id" name="prodi_id">
                                <option value="" disabled>Pilih...</option>
                                <?php foreach ($prodi as $p) : ?>
                                    <option <?= $p['id'] == ($mahasiswa['prodi_id'] ?? old('id')) ? 'selected' : ''; ?> value="<?= $p['id']; ?>"><?= $p['jenjang'] . ' ' . $p['nama']; ?></option>
                                <?php endforeach; ?>
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
                    <button type="submit" class="btn btn-success">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>