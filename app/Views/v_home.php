<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
  .carousel-caption h5,
  .carousel-caption p {
    color: #fff; 
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
  }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <h5 class="text-primary mb-3">Welcome 👋</h5>
    </div>
  </div>
</div>

<!-- Carousel Start -->
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner" style="height: 340px; border-radius: 12px; overflow: hidden;">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <img src="<?= base_url('sneat-1.0.0/assets/img/illustrations/ipone.jpg') ?>" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
              <h5>iPhone Pro Max</h5>
              <p>Teknologi mutakhir dalam genggaman Anda.</p>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <img src="<?= base_url('sneat-1.0.0/assets/img/illustrations/ipone2.jpg') ?>" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
              <h5>Desain Futuristik</h5>
              <p>Elegan, ramping, dan penuh gaya.</p>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <img src="<?= base_url('sneat-1.0.0/assets/img/illustrations/ipone3.jpg') ?>" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
              <h5>Kamera Canggih</h5>
              <p>Abadikan setiap momen dengan sempurna.</p>
            </div>
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      <!-- Carousel End -->

<?= $this->endSection() ?>