<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
            title: 'User successfully {$message}',
            position: 'center',
            icon: 'success',
            width: 420,
            showConfirmButton: false,
            timer: 1500
        }
    )
</script>