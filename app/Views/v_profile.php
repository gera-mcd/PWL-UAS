<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h2>Welcome, <?= esc($username) ?>!</h2>
<p>Your role is: <?= esc($role) ?></p>
<?= $this->endSection() ?>
