<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header">
            <a href="{base_url('users')} " class="text-decoration-none btn btn-secondary">Back</a>
        </div>
        <div class="card-body">

            {form_open_multipart('user/store')}
            {* <form action="{base_url('user/store')}" method="POST" > *}
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image"  class="form-control" size="20" />
                {* {form_error('image')} *}
            </div>
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{set_value('first_name')}"
                    id="first_name">
                {form_error('first_name')}
            </div>

            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{set_value('last_name')}"
                    id="last_name">
                {form_error('last_name')}
            </div>

            <div class="form-group">
                <label for="">Email </label>
                <input type="text" name="email" class="form-control" value="{set_value('email')}" id="email">
                {form_error('email')}
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{set_value('phone_number')}"
                    id="phone_number">
                {form_error('phone_number')}
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" class="form-control" rows="5">{set_value('address')}</textarea>
                {form_error('address')}
            </div>

            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-success mt-2" id="create-post" value="upload">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>