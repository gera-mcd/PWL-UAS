<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Produk Terjual</h1>

<table class="table table-striped">
  <thead class="table-thead-dark">
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>

    <?php

    foreach ($sold_produk as $index => $produk): ?>
    <tr>
      <td><?= $index + 1 ?></td>
      <td><?= htmlspecialchars($produk['nama'], ENT_QUOTES, 'UTF-8') ?></td>
      <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
      <td><?= htmlspecialchars($produk['jumlah'], ENT_QUOTES, 'UTF-8') ?></td>
      <td>Rp <?= number_format($produk['total'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
<?= $this->endSection() ?>