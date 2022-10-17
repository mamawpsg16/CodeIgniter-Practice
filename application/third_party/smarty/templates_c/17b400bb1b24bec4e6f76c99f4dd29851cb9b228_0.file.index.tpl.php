<?php
/* Smarty version 3.1.47, created on 2022-10-17 09:19:56
  from 'C:\xampp\htdocs\blog-cg\application\views\user\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634d1e3cec9891_53803945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17b400bb1b24bec4e6f76c99f4dd29851cb9b228' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog-cg\\application\\views\\user\\index.tpl',
      1 => 1665991813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634d1e3cec9891_53803945 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container mt-5">
        <div class="card">
    <div class="card-header d-flex justify-content-end ">
            <a href="<?php echo base_url('user/create');?>
" class="text-decoration-none btn btn-success">Add User</a>
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
                        <th disabled="disabled">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                                <?php if (count($_smarty_tpl->tpl_vars['users']->value) > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->iteration = 0;
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
$_smarty_tpl->tpl_vars['user']->iteration++;
$__foreach_user_0_saved = $_smarty_tpl->tpl_vars['user'];
?>
                                <tr>
                                <td>
                                        <?php echo $_smarty_tpl->tpl_vars['user']->iteration;?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value->first_name;?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->last_name;?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value->phone_number;?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>

                                    </td>
                                    <td class="d-flex ">
                                        <!-- <a href="<?php echo '<?php ';?>
echo base_url('user/' . $user->id) <?php echo '?>';?>
" class="btn btn-sm btn-secondary m-1">View</a>     -->
                                        <a href=<?php echo base_url("user/edit/".((string)$_smarty_tpl->tpl_vars['user']->value->id));?>
 class="btn btn-sm btn-primary m-1">Edit</a>
                                        <button class="btn btn-sm btn-danger m-1 delete-btn" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">Delete</ />
                                    </td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php }
}
