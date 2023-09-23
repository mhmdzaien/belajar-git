<?= $this->extend('Layouts/master'); ?>

<?= $this->section('content'); ?>

<div class="row mt-3">
    <div class="card-header bg-dark">
        <div class="card-title text-light text-center h4">Data Prodi </div>
    </div>
    <div class="card">
        <form class="d-flex">
            <a class="btn btn-primary text-light" href="<?= base_url("prodi/tambah") ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg> Tambah</a>
        </form>
            <div class=" table-responsive mt-3" style="max-height: 400px; overflow-y: auto;">
            <table class="mt-3 table table-striped">
                <thead class="bg-dark text-light text-center">
                    <th>No.</th>
                    <th>Nama Prodi</th>
                    <th>Jenjang</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($prodi as $usr) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $usr['nama']; ?></td>
                            <td><?= $usr['jenjang']; ?></td>
                            <td>

                                <a href="<?= base_url() ?>prodi/ubah/<?= $usr['id'] ?>" class="btn btn-success fs-6 text-decoration-none fw-bold me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                                <a href="<?= base_url() ?>prodi/hapus/<?= $usr['id'] ?>" class="btn btn-danger fs-6 text-decoration-none fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </a>
                            </td>
                            <?php $i++; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <?php if (empty($prodi)) : ?>
            <div class="alert alert-danger">
                Data masih kosong!
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>