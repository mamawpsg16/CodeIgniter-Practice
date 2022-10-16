<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#users-table').DataTable();

            $('#users-table thead th').each(function(e) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="' + title + '" class="form-control" style="font-size: 12px; font-weight: bold"/>');
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
        }, 100)
    });

    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(btn => btn.addEventListener('click', function(e) {
        e.preventDefault();
        $('#delete-user-modal').modal('show')
        let id = this.value;
        document.getElementById('delete-confirmation').addEventListener('click', function() {
            var xhttp = new XMLHttpRequest();
            var url = '/user/delete/' + id;
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // function execute after request is successful 
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            }
            // Sending our request 
            xhttp.send(id);
        })
    }))

    $('#cancel').click(function(e) {
        $('#delete-user-modal').modal('hide')
        e.preventDefault();
    })

    $('#close').click(function(e) {
        $('#delete-user-modal').modal('hide')
        e.preventDefault();
    })
</script>
</body>

</html>