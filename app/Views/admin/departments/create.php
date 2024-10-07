<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form action="<?= base_url('admin/department/store') ?>" method="post">
            <div class="input-style-1">
                <label>Department</label>
                <input type="text" class="form-control <?= $validation->hasError('department') ? 'is-invalid' : '' ?>" name="department" placeholder="Department" />
                <div class="invalid-feedback">
                    <?= $validation->getError('department') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= $route_back ?>" class="btn btn-warning ml-5 text-white">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>