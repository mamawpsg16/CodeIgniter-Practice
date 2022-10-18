<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header">
            <a href="<?php echo base_url('users') ?>" class="text-decoration-none btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('user/store') ?>" method="POST">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" id="first_name">
                    <?php echo form_error('first_name'); ?>
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" id="last_name">
                    <?php echo form_error('last_name'); ?>
                </div>
                
                
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email">
                    <?php echo form_error('email'); ?>
                </div>
                
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="<?php echo set_value('phone_number'); ?>" id="phone_number">
                    <?php echo form_error('phone_number'); ?>
                </div>
                
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo set_value('address'); ?>" id="address">
                    <?php echo form_error('address'); ?>

                </div>

                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-2" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>