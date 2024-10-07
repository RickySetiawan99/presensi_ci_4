<?= $this->extend('pegawai/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-2">1</div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Presensi Masuk</div>
            <div class="card-body">
                <div class="tanggal">
                    <?= date('d F Y') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">3</div>
    <div class="col-md-2">4</div>
</div>

<?= $this->endSection() ?>