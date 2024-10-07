<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form action="<?= base_url('admin/presence_location/store') ?>" method="post">
            <div class="input-style-1">
                <label>Name</label>
                <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" name="name" placeholder="Name" />
                <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Address</label>
                <textarea name="address" class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" cols="30" rows="3" placeholder="Address"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('address') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Tipe</label>
                <input type="text" class="form-control <?= $validation->hasError('tipe') ? 'is-invalid' : '' ?>" name="tipe" placeholder="Tipe" />
                <div class="invalid-feedback">
                    <?= $validation->getError('tipe') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Latitude</label>
                <input type="text" class="form-control <?= $validation->hasError('latitude') ? 'is-invalid' : '' ?>" name="latitude" placeholder="Latitude" />
                <div class="invalid-feedback">
                    <?= $validation->getError('latitude') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Longitude</label>
                <input type="text" class="form-control <?= $validation->hasError('longitude') ? 'is-invalid' : '' ?>" name="longitude" placeholder="Longitude" />
                <div class="invalid-feedback">
                    <?= $validation->getError('longitude') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Radius</label>
                <input type="number" class="form-control <?= $validation->hasError('radius') ? 'is-invalid' : '' ?>" name="radius" placeholder="Radius" />
                <div class="invalid-feedback">
                    <?= $validation->getError('radius') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Timezone</label>
                <select name="timezone" class="form-control <?= $validation->hasError('timezone') ? 'is-invalid' : '' ?>">
                    <option value="">Select Timezone</option>
                    <option value="WIB">WIB</option>
                    <option value="WITA">WITA</option>
                    <option value="WIT">WIT</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('timezone') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Clock In</label>
                <input type="time" class="form-control <?= $validation->hasError('clock_in') ? 'is-invalid' : '' ?>" name="clock_in" placeholder="Clock In" />
                <div class="invalid-feedback">
                    <?= $validation->getError('clock_in') ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Clock Out</label>
                <input type="time" class="form-control <?= $validation->hasError('clock_out') ? 'is-invalid' : '' ?>" name="clock_out" placeholder="Clock Out" />
                <div class="invalid-feedback">
                    <?= $validation->getError('clock_out') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= $route_back ?>" class="btn btn-warning ml-5 text-white">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>