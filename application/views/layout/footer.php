<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#users-table').DataTable();

        $('#users-table thead th').each(function(e) {
            var title = this.innerHTML;
            if (this.innerHTML == 'Actions') {
                this.innerHTML = '<input type="text" placeholder="' + title + '" class="form-control" disabled="disabled" style="font-size: 12px; font-weight: bold"/>';
            } else {
                this.innerHTML = '<input type="text" placeholder="' + title + '" class="form-control" style="font-size: 12px; font-weight: bold"/>';
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
                        Swal.fire(
                            'Deleted!',
                            'User successfully deleted.',
                            'success'
                        )
                    }
                }
                // Sending our request 
                xhttp.send(id);
            }
        })

    }))

    ClassicEditor
        .create(document.querySelector('#address'), {
            toolbar: ['undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });

    let close = document.querySelectorAll('#close');
    close.forEach(close => close.addEventListener('click', function(e) {
        e.preventDefault();
        $('#delete-user-modal').modal('hide')
    }));
</script>
</body>

</html>