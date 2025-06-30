<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
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
    <?php if (!empty($cartItems) && is_array($cartItems)): ?>
      <?php foreach ($cartItems as $item): ?>
        <tr>
          <td><img src="<?= base_url('uploads/' . esc($item['foto'])) ?>" alt="<?= esc($item['nama']) ?>" style="width: 60px; height: auto;"></td>
          <td><?= esc($item['nama']) ?></td>
          <td><?= esc(number_format($item['harga'], 0, ',', '.')) ?></td>
          <td><?= esc($item['jumlah']) ?></td>
          <td><?= esc(number_format($item['harga'] * $item['jumlah'], 0, ',', '.')) ?></td>
          <td class="text-end">
            <button class="btn btn-sm btn-warning me-2 btn-edit" data-id="<?= esc($item['id']) ?>"><i class="bx bx-edit"></i> Edit</button>
            <button class="btn btn-sm btn-danger btn-delete" data-id="<?= esc($item['id']) ?>"><i class="bx bx-trash"></i> Hapus</button>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6" class="text-center">Keranjang kosong</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<script>
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      alert('Hapus produk dengan ID: ' + id + ' belum diimplementasikan.');
    });
  });
</script>

<?= $this->endSection() ?>