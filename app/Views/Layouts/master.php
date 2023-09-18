<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Latihan</title>
    <link href="<?= base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <?= $this->renderSection('cssScript') ?>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=base_url('register');?>">Register</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=base_url('akun');?>">Akun</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=base_url('mahasiswa');?>">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=base_url('prodi');?>">Prodi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=base_url('semester');?>">Semester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('login/logout');?>" tabindex="-1" aria-disabled="true">Logout</a>
                        </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
    <?= $this->renderSection('content') ?>
    </main>

    <footer>

    </footer>
    <?= $this->renderSection('jsScript') ?>

</body>

</html>