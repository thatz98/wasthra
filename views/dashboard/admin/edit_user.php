<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit User</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['user_id'] ?>" id="editFrom" method="post">
                        <div class="row-top">
                            <div class="col-2 pad-l-55">
                            <label>First Name : </label><br><input type="text" name="first_name" value="<?php echo $this->user[0]['first_name'] ?>"><br>
                            <label>Mobile Number : </label><br><input type="text" name="contact_no" value="<?php echo $this->user[0]['contact_no'] ?>"><br>
                            <label>User Type : </label><br><select name="user_type">
                              <option value="customer" <?php if($this->user[0]['user_type']=='customer') echo "selected=\"selected\"";?>>Customer</option>
                              <option value="admin" <?php if($this->user[0]['user_type']=='admin') echo "selected=\"selected\"";?>>Admin</option>
                              <option value="owner" <?php if($this->user[0]['user_type']=='owner') echo "selected=\"selected\"";?>>Owner</option>
                              <option value="delivery" <?php if($this->user[0]['user_type']=='delivery') echo "selected=\"selected\"";?>>Delivery</option>
                        </select><br>
                        <label>User Status : </label><br><select name="user_status" value="<?php echo $this->user[0]['user_status'] ?>">
                              <option value="new" <?php if($this->user[0]['user_status']=='new') echo "selected=\"selected\"";?>>New</option>
                              <option value="verified" <?php if($this->user[0]['user_status']=='verified') echo "selected=\"selected\"";?>>Verified</option>
                              <option value="blocked" <?php if($this->user[0]['user_status']=='blocked') echo "selected=\"selected\"";?>>Blocked</option>
                              <option value="retired" <?php if($this->user[0]['user_status']=='retired') echo "selected=\"selected\"";?>>Retired</option>
                        </select><br>
                        </div>
                        <div class="col-2 pad-l-55" >
                            <label>Last Name : </label><br><input type="text" name="last_name" value="<?php echo $this->user[0]['last_name'] ?>"><br>
                        
                        <label>Email : </label><br><input type="email" name="email" value="<?php echo $this->user[0]['email'] ?>"><br>
                        
                        <label>Gender : </label><br><select name="gender" value="<?php echo $this->user[0]['gender'] ?>">
                              <option value="male" <?php if($this->user[0]['gender']=='male') echo "selected=\"selected\"";?>>Male</option>
                              <option value="female" <?php if($this->user[0]['gender']=='female') echo "selected=\"selected\"";?>>Female</option></select><br>
                        
                        <input type="text" name="prev_user_id" value="<?php echo $this->user[0]['user_id']?>" hidden>
                        <input type="text" name="prev_user_type" value="<?php echo $this->user[0]['user_type']?>" hidden>
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>user" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>

                    </div>

        
</div>
</div>
