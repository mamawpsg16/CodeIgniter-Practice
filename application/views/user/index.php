<div class="container mt-5">
    <?php if (($this->session->flashdata('store'))) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('store'); ?></div>
    <?php endif; ?>
    <?php if (($this->session->flashdata('destroy'))) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('destroy'); ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header d-flex justify-content-end ">
            <a href="<?php echo base_url('user/create') ?>" class="text-decoration-none btn btn-success">Add User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  table-hover  dt-responsive" id="users-table" width="100%">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone #</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php if ($users) {; ?>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $user->first_name . ', ' . $user->last_name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->phone_number; ?></td>
                                    <td><?php echo $user->address; ?></td>
                                    <td class="d-flex ">
                                        <!-- <a href="<?php echo base_url('user/' . $user->id) ?>" class="btn btn-sm btn-secondary m-1">View</a>     -->
                                        <a href="<?php echo base_url('user/edit/' . $user->id) ?>" class="btn btn-sm btn-primary m-1">Edit</a>
                                        <button class="btn btn-sm btn-danger m-1 delete-btn" value="<?= $user->id ?>">Delete</ />
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>