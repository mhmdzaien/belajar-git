<?php $this->extend('Layouts/master'); ?>

<?php $this->section('content'); ?>

<?php

$errors = session()->getFlashData('validator');
$errors['duplicate'] = session()->getFlashData('duplicate');
?>

<div class="container">
  <div class="col-md-6 m-auto mt-3">
    <div class="card ">
      <div class="card-header bg-dark text-light">
        <h1 class="text-center">Ubah Data Program Studi</h1>
      </div>
      <form action="/prodi/update" method="post">
        <input type="hidden" name="id" value="<?= old('id') ?? $prodi['id']; ?>">
        <div class="card-body">
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= empty($errors['prodi']) ? '' : 'is-invalid'; ?>" placeholder="Nama Program Studi" name="prodi" value="<?= old('prodi') ?? $prodi['nama']; ?>">
            <div class="invalid-feedback">
              <?= $errors['prodi'] ?? ''; ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= empty($errors['jenjang']) ? '' : 'is-invalid'; ?>" placeholder="Jenjang" name="jenjang" value="<?= old('jenjang') ?? $prodi['jenjang']; ?>">
            <div class="invalid-feedback">
              <?= $errors['jenjang'] ?? ''; ?>
            </div>
          </div>
          <div class="text-danger">
            <?= $errors['duplicate'] ?? ''; ?>
          </div>
        </div>
        <div class="card-footer border-light d-flex justify-content-between">
          <a href="/prodi" class="btn btn-primary">Kembali</a>
          <button type="submit" class="btn btn-success">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $this->endSection(); ?>