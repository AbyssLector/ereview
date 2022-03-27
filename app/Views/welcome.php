<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="alert alert-success" role="alert">
    welcome <?= session()->getFlashdata('success'); ?>!
</div>
<?= $this->endSection(); ?>