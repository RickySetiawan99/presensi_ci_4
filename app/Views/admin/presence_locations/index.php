<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/presence_location/create') ?>" class="btn btn-primary">
    <i class="lni lni-circle-plus"></i>
    Add Data
</a>

<table id="datatables" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Radius</th>
            <th>Timezone</th>
            <th>Clock in</th>
            <th>Clock out</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; 
        foreach($presence_locations as $presence_location) : ?>
            <tr>
                <td><?=  $no++ ?></td>
                <td><?=  $presence_location['name'] ?></td>
                <td><?=  $presence_location['tipe'] ?></td>
                <td><?=  $presence_location['radius'] ?></td>
                <td><?=  $presence_location['timezone'] ?></td>
                <td><?=  $presence_location['clock_in'] ?></td>
                <td><?=  $presence_location['clock_out'] ?></td>
                <td>
                    <a href="<?= base_url('admin/presence_location/detail/'.encode_id($presence_location['id'])) ?>" class="badge bg-info">detail</a>
                    <a href="<?= base_url('admin/presence_location/edit/'.encode_id($presence_location['id'])) ?>" class="badge bg-primary">Edit</a>
                    <a href="<?= base_url('admin/presence_location/delete/'.encode_id($presence_location['id'])) ?>" class="badge bg-danger delete-button">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>