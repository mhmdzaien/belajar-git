<?php

$this->extend('layouts/master');

$this->section('content');

$errors = session()->getFlashdata('validator');

?>

<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h2>Tambah Mata Kuliah</h2>
      </div>
      <?php if (session()->getFlashdata('flashMessage')) : ?>
        <div class="alert alert-<?= session()->getFlashdata('flashMessageColor') ?>">
          <?= session()->getFlashdata('flashMessage'); ?>
        </div>
      <?php endif; ?>
    </div>
    <form action="/matakuliah/simpan" method="post">
      <div class="card-body">
        <div class="mb-3">
          <input type="text" name="nama" id="nama" class="form-control <?= empty($errors['nama']) ? '' : 'is-invalid'; ?>" placeholder="Nama Mata Kuliah" value="<?= old('nama') ?? ''; ?>">
          <div class="invalid-feedback">
            <?= $errors['nama'] ?? ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" name="sks" id="sks" class="form-control <?= empty($errors['sks']) ? '' : 'is-invalid'; ?>" placeholder="Jumlah SKS" value="<?= old('sks') ?? ''; ?>">
          <div class="invalid-feedback">
            <?= $errors['sks'] ?? ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" name="semester" id="semester" class="form-control <?= empty($errors['semester']) ? '' : 'is-invalid'; ?>" placeholder="Semester" value="<?= old('semester') ?? ''; ?>">
          <div class="invalid-feedback">
            <?= $errors['semester'] ?? ''; ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-between">
          <a href="/matakuliah" class="btn btn-primary">Kembali</a>
          <button type="submit" href="/matakuliah/simpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $this->endSection(); ?>