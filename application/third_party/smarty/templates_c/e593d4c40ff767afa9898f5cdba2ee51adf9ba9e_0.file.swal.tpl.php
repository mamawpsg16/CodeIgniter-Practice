<?php
/* Smarty version 3.1.47, created on 2022-10-19 01:31:57
  from 'C:\xampp\htdocs\blog-cg\application\views\templates\swal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634f376d91ed01_91189372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e593d4c40ff767afa9898f5cdba2ee51adf9ba9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog-cg\\application\\views\\templates\\swal.tpl',
      1 => 1666059229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634f376d91ed01_91189372 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="//cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
//   const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 1500,
//         timerProgressBar: true,
//         didOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer)
//             toast.addEventListener('mouseleave', Swal.resumeTimer)
//         }
//     })
    Swal.fire({
            title: 'User successfully <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
',
            position: 'center',
            icon: 'success',
            width: 420,
            showConfirmButton: false,
            timer: 1500
        }
    )
<?php echo '</script'; ?>
><?php }
}
