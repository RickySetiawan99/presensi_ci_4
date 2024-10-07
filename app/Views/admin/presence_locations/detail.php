<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<div class="card col-md-8">
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?= $presence_location['name'] ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><?= $presence_location['address'] ?></td>
            </tr>
            <tr>
                <td>Tipe</td>
                <td>:</td>
                <td><?= $presence_location['tipe'] ?></td>
            </tr>
            <tr>
                <td>Latitude</td>
                <td>:</td>
                <td><?= $presence_location['latitude'] ?></td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td>:</td>
                <td><?= $presence_location['longitude'] ?></td>
            </tr>
            <tr>
                <td>Radius</td>
                <td>:</td>
                <td><?= $presence_location['radius'] ?></td>
            </tr>
            <tr>
                <td>Timezone</td>
                <td>:</td>
                <td><?= $presence_location['timezone'] ?></td>
            </tr>
            <tr>
                <td>Clock In</td>
                <td>:</td>
                <td><?= $presence_location['clock_in'] ?></td>
            </tr>
            <tr>
                <td>Clock Out</td>
                <td>:</td>
                <td><?= $presence_location['clock_out'] ?></td>
            </tr>
        </table>
    </div>
</div>

<a href="<?= $route_back ?>" class="btn btn-warning text-white mt-3">Cancel</a>

<?= $this->endSection() ?>