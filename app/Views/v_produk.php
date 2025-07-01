<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4>Produk</h4>
  <div>
    <button class="btn btn-primary me-2" id="btnSearch"><i class="bx bx-search"></i> Search</button>
    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i> Tambah Produk</button>
    <button class="btn btn-danger" id="btnDownloadPdf"><i class="bx bx-file-pdf"></i> Download PDF</button>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
        <th>#</th>
      <th>Foto</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($products) && is_array($products)): ?>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><img src="<?= base_url('uploads/' . esc($product['foto'])) ?>" alt="<?= esc($product['nama']) ?>" style="width: 60px; height: auto;"></td>
          <td><?= esc($product['nama']) ?></td>
          <td><?= esc(number_format($product['harga'], 0, ',', '.')) ?></td>
          <td><?= esc($product['jumlah']) ?></td>
          <td class="text-end">
            <button class="btn btn-sm btn-warning me-2 btn-edit" data-id="<?= esc($product['id']) ?>"><i class="bx bx-edit"></i> Edit</button>
            <button class="btn btn-sm btn-danger btn-delete" data-id="<?= esc($product['id']) ?>"><i class="bx bx-trash"></i> Hapus</button>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada produk</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<script>
  document.getElementById('btnSearch').addEventListener('click', function() {
    alert('Fungsi pencarian belum diimplementasikan.');
  });

  document.getElementById('btnAddProduct').addEventListener('click', function() {
    alert('Fungsi tambah produk belum diimplementasikan.');
  });

  document.getElementById('btnDownloadPdf').addEventListener('click', function() {
    alert('Fungsi download PDF belum diimplementasikan.');
  });

  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      alert('Edit produk dengan ID: ' + id + ' belum diimplementasikan.');
    });
  });

  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      alert('Hapus produk dengan ID: ' + id + ' belum diimplementasikan.');
    });
  });
</script>

<?= $this->endSection() ?>
