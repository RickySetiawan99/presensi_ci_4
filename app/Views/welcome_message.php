<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <?php if (session()->getFlashdata('login_success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('login_success') ?>
        </div>
    <?php endif; ?>

    <h1>Hello World!</h1>
<?= $this->endSection() ?>