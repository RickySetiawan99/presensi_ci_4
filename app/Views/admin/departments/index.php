<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/department/create') ?>" class="btn btn-primary">
    <i class="lni lni-circle-plus"></i>
    Add Data
</a>

<table id="datatables" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; 
        foreach($departments as $department) : ?>
            <tr>
                <td><?=  $no++ ?></td>
                <td><?=  $department['department'] ?></td>
                <td>
                    <a href="<?= base_url('admin/department/edit/'.encode_id($department['id'])) ?>" class="badge bg-primary">Edit</a>
                    <a href="<?= base_url('admin/department/delete/'.encode_id($department['id'])) ?>" class="badge bg-danger delete-button">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>