<?php
/* Smarty version 4.2.1, created on 2022-10-19 09:15:27
  from 'C:\wamp64\www\blog-cg\application\views\user\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634fc02fdbbea2_89241027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00c07eede125037625ef7933cf61bb8946ae6caf' => 
    array (
      0 => 'C:\\wamp64\\www\\blog-cg\\application\\views\\user\\index.tpl',
      1 => 1666170663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
    'file:../templates/swal.tpl' => 2,
    'file:../templates/footer.tpl' => 1,
  ),
),false)) {
function content_634fc02fdbbea2_89241027 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"CodeIgniterSmarty Practice"), 0, false);
?>
<div class="container mt-5">
    <?php if (!empty($_smarty_tpl->tpl_vars['flash_store']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:../templates/swal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>"added"), 0, false);
?>

    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['flash_update']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:../templates/swal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>"updated"), 0, true);
?>
    <?php }?>
    <div class="card">
        <div class="card-header d-flex justify-content-end ">
            <a href="<?php echo base_url('user/exportPDF');?>
"  target="_blank" class="text-decoration-none btn btn-secondary mr-2">Export PDF</a>
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
                                                <?php if (count($_smarty_tpl->tpl_vars['users']->value) > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->iteration = 0;
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
$_smarty_tpl->tpl_vars['user']->iteration++;
$__foreach_user_0_saved = $_smarty_tpl->tpl_vars['user'];
?><tr><td><?php echo $_smarty_tpl->tpl_vars['user']->iteration;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value->first_name;?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->last_name;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value->phone_number;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>
</td><td class="d-flex align-items-center justify-content-center"><!-- <a href="<?php echo '<?php'; ?>
 echo base_url('user/' . $user->id) <?php echo '?>'; ?>
" class="btn btn-sm btn-secondary m-1">View</a>     --><a href=<?php echo base_url("user/edit/".((string)$_smarty_tpl->tpl_vars['user']->value->id));?>
 class="btn btn-sm btn-primary mr-2">Edit</a><button class="btn btn-sm btn-danger delete-btn" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">Delete</ /></td></tr><?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function() {
        $('#users-table').DataTable();

        $('#users-table thead th').each(function(e) {
            var title = this.innerHTML;
            if (this.innerHTML == 'Actions') {
                this.innerHTML = '<input type="text" placeholder="' + title +
                    '" class="form-control" disabled="disabled" style="font-size: 12px; font-weight: bold"/>';
            } else {
                this.innerHTML = '<input type="text" placeholder="' + title +
                    '" class="form-control" style="font-size: 12px; font-weight: bold"/>';
            }
        });

        $('#users-table').DataTable().columns().every(function() {
            var that = this;
            $('input', this.header()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(btn => btn.addEventListener('click', function(e) {
        e.preventDefault();
        let id = this.value;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                var xhttp = new XMLHttpRequest();
                var url = '/user/delete/' + id;
                xhttp.open("POST", url, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // function execute after request is successful
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        Swal.fire({
                            title: 'User successfully deleted',
                            width: 420,
                            position: 'center',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
                // Sending our request 
                xhttp.send(id);
            }
        })

    }))
<?php echo '</script'; ?>
><?php }
}
