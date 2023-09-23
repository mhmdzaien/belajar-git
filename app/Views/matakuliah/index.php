<?php

$this->extend('layouts/master');

$this->section('content');

?>


<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1 class="text-center">Tabel Mata Kuliah</h1>
      </div>
    </div>
    <div class="card-body">
      <?php if (session()->getFlashdata('alertMessage')) : ?>
        <div class="alert alert-<?= session()->getFlashdata('alertMessageColor') ?>">
          <?= session()->getFlashdata('alertMessage'); ?>
        </div>
      <?php endif; ?>
      <a href="/matakuliah/tambah" class="btn btn-success">
        Tambah Mata Kuliah
      </a>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Semester</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($matakuliah as $mk) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $mk['nama']; ?></td>
                <td><?= $mk['sks']; ?></td>
                <td><?= $mk['semester']; ?></td>
                <td><?= $mk['created_at']; ?></td>
                <td><?= $mk['updated_at']; ?></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <a href="/matakuliah/ubah/<?= $mk['id']; ?>" class="btn btn-primary me-3">Ubah</a>
                    <a href="/matakuliah/hapus/<?= $mk['id']; ?>" class="btn btn-danger">Hapus</a>
                  </div>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $this->endSection(); ?>