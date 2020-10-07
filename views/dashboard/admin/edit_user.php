<h1>Edit User</h1>
<?php print_r($this->user); ?>
<form action="<?php echo URL; ?>user/editSave/<?php echo $this->user['nic'] ?>" id="addFrom" method="post">
                        <label>First Name : </label><input type="text" name="first_name" value="<?php echo $this->user['first_name'] ?>"><br>
                        <label>Last Name : </label><input type="text" name="last_name" value="<?php echo $this->user['last_name'] ?>"><br>
                        <label>NIC : </label><input type="text" name="nic" value="<?php echo $this->user['nic'] ?>"><br>
                        <label>Email : </label><input type="email" name="email" value="<?php echo $this->user['email'] ?>"><br>
                        <label>Mobile Number : </label><input type="text" name="contact_no" value="<?php echo $this->user['contact_no'] ?>"><br>
                        <label>Gender : </label><select name="gender" value="<?php echo $this->user['gender'] ?>">
                        	<option value="male" <?php if($this->user['gender']=='male') echo "selected=\"selected\"";?>>Male</option>
                        	<option value="female" <?php if($this->user['gender']=='female') echo "selected=\"selected\"";?>>Female</option></select><br>
                        <label>User Type : </label><select name="user_type">
                        	<option value="customer" <?php if($this->user['user_type']=='customer') echo "selected=\"selected\"";?>>Customer</option>
                        	<option value="admin" <?php if($this->user['user_type']=='admin') echo "selected=\"selected\"";?>>Admin</option>
                        	<option value="owner" <?php if($this->user['user_type']=='owner') echo "selected=\"selected\"";?>>Owner</option>
                        	<option value="delivery" <?php if($this->user['user_type']=='delivery') echo "selected=\"selected\"";?>>Delivery</option>
                        </select><br>
                        <label>User Status : </label><select name="user_status" value="<?php echo $this->user['user_status'] ?>">
                        	<option value="new" <?php if($this->user['user_status']=='new') echo "selected=\"selected\"";?>>New</option>
                        	<option value="verified" <?php if($this->user['user_status']=='verified') echo "selected=\"selected\"";?>>Verified</option>
                        	<option value="blocked" <?php if($this->user['user_status']=='blocked') echo "selected=\"selected\"";?>>Blocked</option>
                        	<option value="retired" <?php if($this->user['user_status']=='retired') echo "selected=\"selected\"";?>>Retired</option>
                        </select><br>
                        <button type="submit" class="btn">Register</button>
                    </form>