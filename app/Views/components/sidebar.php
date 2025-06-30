<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class="app-brand-logo demo"></span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Zellion</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= ($segment1 == '') ? 'active' : '' ?>">
      <a href="<?= base_url('/') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Info Produk -->
    <li class="menu-item <?= in_array($segment1, ['produk', 'keranjang', 'profile']) ? 'open' : '' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Info Produk</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?= ($segment1 == 'produk') ? 'active' : '' ?>">
          <a href="<?= base_url('produk') ?>" class="menu-link">
            <div data-i18n="Without menu">Produk</div>
          </a>
        </li>
        <li class="menu-item <?= ($segment1 == 'keranjang') ? 'active' : '' ?>">
          <a href="<?= base_url('keranjang') ?>" class="menu-link">
            <div data-i18n="Without menu">Keranjang</div>
          </a>
        </li>
        <li class="menu-item <?= ($segment1 == 'profile') ? 'active' : '' ?>">
          <a href="<?= base_url('profile') ?>" class="menu-link">
            <div data-i18n="Without navbar">Profile</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item <?= in_array($segment1, ['account', 'login']) ? 'open' : '' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Account Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?= ($segment1 == 'account') ? 'active' : '' ?>">
          <a href="<?= base_url('account') ?>" class="menu-link">
            <div data-i18n="Account">Account</div>
          </a>
        </li>
        <li class="menu-item <?= ($segment1 == 'login') ? 'active' : '' ?>">
          <a href="<?= base_url('login') ?>" class="menu-link" target="_blank">
            <div data-i18n="Basic">Login</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Misc</span>
    </li>
    <li class="menu-item">
      <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Support</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="#" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Documentation">Documentation</div>
      </a>
    </li>
  </ul>
</aside>
