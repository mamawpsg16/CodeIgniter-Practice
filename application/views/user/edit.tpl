<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header">
            <a href="{base_url('users')} " class="text-decoration-none btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            {* <form action="{base_url('user/update/')}{$user->id}" method="POST"> *}
            <form action="{base_url('user/update/')}{$user->id}" method="POST" enctype="multipart/form-data">
            <div class="form-group d-flex flex-column align-items-center">
            <img src="{base_url('assets/images/uploads/')}{{$user->image|default:"default.png"}}" alt="Profile Image"  class="img-fluid rounded" width="30%">
            <label for="">Image</label>
            <input type="file" name="image"  class="form-control" size="20" />
            {* {form_error('image')} *}
        </div>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{$user->first_name}" id="first_name">
                    {form_error('first_name')}
                </div>
                
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{$user->last_name}" id="last_name">
                    {form_error('last_name')}
                </div>
                
                
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="text" name="email" class="form-control" value="{$user->email}" id="email">
                    {form_error('email')}
                </div>
                
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{$user->phone_number}" id="phone_number">
                    {form_error('phone_number')}
                </div>
                
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address"  class="form-control" rows="5" >{$user->address}</textarea>
                    {form_error('address')}
                </div>

                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-2" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>