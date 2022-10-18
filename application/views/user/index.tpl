{include file="../templates/header.tpl" title="CodeIgniterSmarty Practice"}
<div class="container mt-5">
    {if !empty($flash_store)}
        {* <div class="alert alert-success">{$flash_store}</div> *}
        {include file="../templates/swal.tpl" message="added"}

    {/if}
    {if !empty($flash_update)}
        {* <div class="alert alert-primary">{$flash_update}</div> *}
        {include file="../templates/swal.tpl" message="updated"}
    {/if}
    <div class="card">
        <div class="card-header d-flex justify-content-end ">
            <a href="{base_url('user/create')}" class="text-decoration-none btn btn-success">Add User</a>
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
                        {* {counter start=0}
                        {counter} *}
                        {strip}
                            {if count($users) > 0}
                                {foreach from=$users item='user'}
                                    <tr>
                                        <td>
                                            {$user@iteration}
                                        </td>
                                        <td>
                                            {$user->first_name}, {$user->last_name}
                                        </td>
                                        <td>
                                            {$user->email}
                                        </td>
                                        <td>
                                            {$user->phone_number}
                                        </td>
                                        <td>
                                            {$user->address}
                                        </td>
                                        <td class="d-flex ">
                                            <!-- <a href="<?php echo base_url('user/' . $user->id) ?>" class="btn btn-sm btn-secondary m-1">View</a>     -->
                                            <a href={base_url("user/edit/{$user->id}")} class="btn btn-sm btn-primary m-1">Edit</a>
                                            <button class="btn btn-sm btn-danger m-1 delete-btn" value="{$user->id}">Delete</ />
                                        </td>
                                    </tr>
                                {/foreach}
                            {/if}
                        {/strip}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{include file="../templates/footer.tpl"}
<script type="text/javascript">
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
                        // $('#users-table').DataTable().destroy();
                        // $('#users-table').DataTable();
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
</script>