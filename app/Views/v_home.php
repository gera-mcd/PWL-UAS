<?php $role = session()->get('role') ?? ''; ?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <h5 class="text-primary mb-3">Home </h5>

      <!-- Carousel Start -->
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner" style="height: 340px; border-radius: 12px; overflow: hidden;">
          <div class="carousel-item active">
            <img src="<?= base_url('img/iphone-16_og.png') ?>" class="d-block w-100" style="object-fit: contain; height: 340px;" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="<?= base_url('img/Samsung/Samsung-Galaxy-S25-Ultra-2.jpg') ?>" class="d-block w-100" style="object-fit: contain; height: 340px;" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="<?= base_url('img/Redmi/OIP.webp') ?>" class="d-block w-100" style="object-fit: contain; height: 340px;" alt="Slide 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="filter: invert(1);">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="filter: invert(1);">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      <!-- Carousel End -->
    </div>
  </div>

  <?php if ($role === 'admin' && isset($product) && is_array($product) && count($product) > 0): ?>
  <div class="row mt-4">
    <h5 class="mb-3">Produk Terdaftar</h5>

    <!-- Category Filter Buttons -->
    <div class="mb-3">
      <?php
        $categories = ['iphone' => 'iPhone', 'samsung' => 'Samsung', 'redmi' => 'Redmi'];
        $selectedCategory = isset($selectedCategory) ? $selectedCategory : '';
      ?>
      <?php foreach ($categories as $key => $label): ?>
        <a href="<?= base_url('produk/category?category=' . $key) ?>"class="btn btn-outline-primary <?= ($selectedCategory === $key) ? 'active' : '' ?>">
          <?= $label ?>
        </a>
      <?php endforeach; ?>
      <a href="<?= base_url('home') ?>" class="btn btn-outline-secondary <?= ($selectedCategory === '') ? 'active' : '' ?>">All</a>

    <?php foreach ($product as $item): ?>
    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="<?= base_url('img/' . $item['foto']) ?>" class="card-img-top" alt="<?= esc($item['nama']) ?>" style="height: 200px; object-fit: contain;">
        <div class="card-body">
          <h6 class="card-title"><?= esc($item['nama']) ?></h6>
          <p class="card-text">IDR <?= number_format($item['harga'], 0, ',', '.') ?></p>
          <!-- Buy button removed as requested -->
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

</div>

<?= $this->endSection() ?>
