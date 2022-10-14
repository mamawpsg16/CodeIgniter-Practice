<div class="container mt-5 w-75">
    <div class="card">
        <div class="card-header d-flex justify-content-end ">
            <a href="<?php echo base_url('user/create') ?>" class="text-decoration-none btn btn-success">Add User</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered  table-hover table-responsive">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>Phone #</td>
                        <td>Address</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;?>
                    <?php if($users) {;?>
                        <?php foreach($users as $user)  {?>
                        <tr>
                            <td><?php echo $counter++ ;?></td>
                            <td><?php echo $user->first_name .''. $user->last_name;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->phone_number;?></td>
                            <td><?php echo $user->address;?></td>
                            <td class="d-flex ">
                                <a href="<?php echo base_url('user/'.$user->id) ?>" class="btn btn-sm btn-secondary m-1">View</a>
                                <a href="<?php echo base_url('user/edit/'.$user->id) ?>" class="btn btn-sm btn-primary m-1">Edit</a>
                                <a href="<?php echo base_url('user/delete/'.$user->id) ?>" class="btn btn-sm btn-danger m-1">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    <?php }else { ?>
                            <td class="text-center" colspan="6">No Data</td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
