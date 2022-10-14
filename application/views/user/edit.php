<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header">
            <a href="<?php echo base_url('users') ?>" class="text-decoration-none btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('user/update'.$user->id) ?>" method="PUT">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $user->first_name ?>" id="first_name">
                    <p><?php echo form_error('first_name'); ?></p>
                </div>
                
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>" id="last_name">
                    <p><?php echo form_error('last_name'); ?></p>
                </div>
                
                
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>" id="email">
                    <p><?php echo form_error('email'); ?></p>
                </div>
                
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="<?= $user->phone_number ?>" id="phone_number">
                    <p><?php echo form_error('phone_number'); ?></p>
                </div>
                
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= $user->address ?>" id="address">
                    <p><?php echo form_error('address'); ?></p>
                </div>

                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-2" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>