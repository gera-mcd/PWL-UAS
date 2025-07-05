<?php
$hlm = "Home";
if (uri_string() != "") {
  $hlm = ucwords(uri_string());
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="<?= base_url('sneat-1.0.0/assets/') ?>" data-template="vertical-menu-template-free">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $hlm ?> - <?= $title ?? 'Zellion' ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('sneat-1.0.0/assets/img/favicon/favicon.ico') ?>" />

  <!-- Fonts -->
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/vendor/fonts/boxicons.css') ?>" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/css/demo.css') ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('sneat-1.0.0/assets/vendor/libs/apex-charts/apex-charts.css') ?>" />

  <!-- Helpers -->
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/js/helpers.js') ?>"></script>

  <!-- Config -->
  <script src="<?= base_url('sneat-1.0.0/assets/js/config.js') ?>"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      
      <!-- Sidebar -->
      <?= $this->include('components/sidebar') ?>

      <!-- Layout container -->
      <div class="layout-page">
        
        <!-- Navbar -->
        <?= $this->include('components/header') ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Main content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <?= $this->renderSection('content') ?>
          </div>
          
          <!-- Footer (optional) -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © <?= date('Y') ?>, made by Zellion
              </div>
              <div>
                <a href="#" class="footer-link me-4">About</a>
                <a href="#" class="footer-link me-4">Support</a>
                <a href="#" class="footer-link me-4">Purchase</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->
        </div>
        <!-- / Content wrapper -->

      </div>
      <!-- / Layout page -->

    </div>
    <!-- / Layout container -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <script src="<?= base_url('MiniStore-1.0.0/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/libs/jquery/jquery.js') ?>"></script>
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/libs/popper/popper.js') ?>"></script>
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/js/menu.js') ?>"></script>

  <!-- Vendors JS -->
  <script src="<?= base_url('sneat-1.0.0/assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

  <!-- Main JS -->
  <script src="<?= base_url('sneat-1.0.0/assets/js/main.js') ?>"></script>

  <!-- Page JS -->
  <script src="<?= base_url('sneat-1.0.0/assets/js/dashboards-analytics.js') ?>"></script>

  <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  
<?= $this->renderSection('script') ?> 
</body>
</html>
