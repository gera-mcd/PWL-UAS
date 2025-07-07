<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 
<h1>Produk </h1>
<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>
<a href="<?= base_url('produk/download') ?>" class="btn btn-success ms-2">Download Data</a>
<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Foto</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($product) && is_array($product)) : ?>
            <?php foreach ($product as $index => $produk) : ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $produk['nama'] ?></td>
                    <td><?= $produk['harga'] ?></td>
                    <td><?= $produk['jumlah'] ?></td>
                    <td>
                        <?php if ($produk['foto'] != '' && file_exists("img/" . $produk['foto'])) : ?>
                            <img src="<?= base_url("img/" . $produk['foto']) ?>" width="100px">
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                            Ubah
                        </button>
                        <a href="<?= base_url('produk/delete/' . $produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                            Hapus
                        </a>
                    </td>
                </tr>