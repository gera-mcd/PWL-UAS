<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php helper(['form', 'number']); ?>
<?= form_open('keranjang/update') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4>Keranjang</h4>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Foto</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($keranjang) && is_array($keranjang)) : ?>
            <?php $no = 1; $total = 0; ?>
            <?php foreach ($keranjang as $item) : ?>
                <tr>
                    <td>
                        <?php if (!empty($item['foto'])) : ?>
                            <img src="<?= base_url('img/' . $item['foto']) ?>" width="100px" alt="Foto Produk">
                        <?php else : ?>
                            Tidak ada foto
                        <?php endif; ?>
                    </td>
                    <td><?= esc($item['nama']) ?></td>
                    <td><?= number_to_currency($item['harga'], 'IDR') ?></td>
                    <td>
                        <input type="number" name="jumlah[<?= esc($item['id']) ?>]" value="<?= esc($item['jumlah']) ?>" min="1" class="form-control" />
                    </td>
                    <td><?= number_to_currency($item['harga'] * $item['jumlah'], 'IDR') ?></td>
                    <td>
                        <a href="<?= base_url('keranjang/remove/' . esc($item['id'])) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus item ini?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $total += $item['harga'] * $item['jumlah']; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Keranjang kosong</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->
<div class="alert alert-info">
    <?php echo "Total = " . number_to_currency($total ?? 0, 'IDR') ?>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Perbarui Keranjang</button>
    <a class="btn btn-warning" href="<?php echo base_url() ?>keranjang/clear">Kosongkan Keranjang</a>
    <?php if (!empty($keranjang)) : ?>
        <a class="btn btn-success" href="<?php echo base_url('checkout') ?>">Selesai Belanja</a>
    <?php endif; ?>
</div>

<?= form_close() ?>
<?= $this->endSection() ?>
