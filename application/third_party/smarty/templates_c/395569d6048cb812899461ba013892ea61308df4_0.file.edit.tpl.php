<?php
/* Smarty version 3.1.47, created on 2022-10-18 11:24:52
  from 'C:\xampp\htdocs\blog-cg\application\views\user\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634e70e4c19e39_71027315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '395569d6048cb812899461ba013892ea61308df4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog-cg\\application\\views\\user\\edit.tpl',
      1 => 1666085090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634e70e4c19e39_71027315 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header">
            <a href="<?php echo base_url('users');?>
 " class="text-decoration-none btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
                        <form action="<?php echo base_url('user/update/');
echo $_smarty_tpl->tpl_vars['user']->value->id;?>
" method="POST" enctype="multipart/form-data">
            <div class="form-group d-flex flex-column align-items-center">
            <img src="<?php echo base_url('assets/images/uploads/');
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->image)===null||$tmp==='' ? "default.png" : $tmp);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" alt="Profile Image"  class="img-fluid rounded" width="30%">
            <label for="">Image</label>
            <input type="file" name="image"  class="form-control" size="20" />
                    </div>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->first_name;?>
" id="first_name">
                    <?php echo form_error('first_name');?>

                </div>
                
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->last_name;?>
" id="last_name">
                    <?php echo form_error('last_name');?>

                </div>
                
                
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="text" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" id="email">
                    <?php echo form_error('email');?>

                </div>
                
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->phone_number;?>
" id="phone_number">
                    <?php echo form_error('phone_number');?>

                </div>
                
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address"  class="form-control" rows="5" ><?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>
</textarea>
                    <?php echo form_error('address');?>

                </div>

                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-2" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
