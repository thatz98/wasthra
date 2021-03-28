<?php require 'views/header_dashboard.php'; ?>
<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit User</h2>
    </div>
    <div class="center-content">
        <div class="form-container">
            <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['user_id'] ?>" id="editFrom" method="post">
                <div class="row-top">
                    <div class="col-2">
                        <div class="helper-text">
                            <label>First Name</label><br>
                            <input type="text" name="first_name" value="<?php echo $this->user[0]['first_name'] ?>" data-helper="First Name" onfocusout="validateEditFirstName()" id="first_name_edituser"><br>
                            <span class="popuptext"></span><br>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="helper-text">
                            <label>Last Name</label><br>
                            <input type="text" name="last_name" value="<?php echo $this->user[0]['last_name'] ?>" data-helper="Last Name" onfocusout="validateEditLastName()" id="last_name_edituser"><br>
                            <span class="popuptext"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="helper-text">
                            <label>Mobile Number</label><br>
                            <input type="text" name="contact_no" placeholder="07XXXXXXXX" data-helper="Mobile No," onfocusout="validateEditContactNo()" id="contact_no_edituser" value="<?php echo $this->user[0]['contact_no'] ?>">
                            <span class="popuptext"></span>
                            <br>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="helper-text">
                            <label>User Type</label><br><select name="user_type" <?php if ($this->user[0]['user_type'] == 'owner') echo 'disabled'; ?>>
                                <option value="customer" <?php if ($this->user[0]['user_type'] == 'customer') echo "selected=\"selected\""; ?>>
                                    Customer</option>
                                <option value="admin" <?php if ($this->user[0]['user_type'] == 'admin') echo "selected=\"selected\""; ?>>Admin
                                </option>
                                <?php if ($this->user[0]['user_type'] == 'owner') echo '<option value="owner" selected>Owner</option>'; ?>
                                <option value="delivery_staff" <?php if ($this->user[0]['user_type'] == 'delivery_staff') echo "selected=\"selected\""; ?>>
                                    Delivery</option>
                            </select>
                            <span class="popuptext"></span>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="helper-text">
                            <?php if ($this->user[0]['user_type'] == 'owner') echo '<input type="text" name="user_type" value="owner" hidden>'; ?>
                            <label>User Status</label><br><select name="user_status" value="<?php echo $this->user[0]['user_status'] ?>">
                                <option value="new" <?php if ($this->user[0]['user_status'] == 'new') echo "selected=\"selected\""; ?>>New
                                </option>
                                <option value="verified" <?php if ($this->user[0]['user_status'] == 'verified') echo "selected=\"selected\""; ?>>
                                    Verified</option>
                                <option value="blocked" <?php if ($this->user[0]['user_status'] == 'blocked') echo "selected=\"selected\""; ?>>
                                    Blocked</option>
                                <option value="retired" <?php if ($this->user[0]['user_status'] == 'retired') echo "selected=\"selected\""; ?>>
                                    Retired</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="helper-text">
                            <label>Email</label><br>
                            <input type="email" name="email" value="<?php echo $this->user[0]['email'] ?>" data-helper="Email" onfocusout="validateEditEmail()" id="email_edituser"><br>
                            <span class="popuptext"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label>Gender</label><br><select name="gender" value="<?php echo $this->user[0]['gender'] ?>">
                            <option value="male" <?php if ($this->user[0]['gender'] == 'male') echo "selected=\"selected\""; ?>>Male</option>
                            <option value="female" <?php if ($this->user[0]['gender'] == 'female') echo "selected=\"selected\""; ?>>Female
                            </option>
                        </select><br>
                    </div>
                </div>

                <input type="text" name="user_id" value="<?php echo $this->user[0]['user_id'] ?>" hidden>
                <input type="text" name="prev_user_type" value="<?php echo $this->user[0]['user_type'] ?>" hidden>
                <input type="text" name="login_id" value="<?php echo $this->user[0]['login_id'] ?>" hidden>
        </div>
    </div>

    <div class="center-content">
        <button type="submit" class="btn">Update</button>
        <a href="<?php echo URL ?>user" class="btn btn-grey">Cancel</a>
    </div>
    </form>
</div>

<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/edit_user_form_validation.js"></script>

