<div id="edit-profile" class="overlay">
    <div class="popup">
    <div class="row-right">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        </div>
    <form action="<?php echo URL; ?>user/editProfile/<?php echo Session::get('userData')['user_id'] ?>" id="editFrom" method="post">
                        <div class="row-top">
                            <div class="col-3">
                            <label>First Name : </label><br><input type="text" name="first_name" value="<?php echo Session::get('userData')['first_name'] ?>"><br><br>
                            <label>Last Name : </label><br><input type="text" name="last_name" value="<?php echo Session::get('userData')['last_name'] ?>"><br><br>
                            <label>Mobile Number : </label><br><input type="text" name="contact_no" value="<?php echo Session::get('userData')['contact_no'] ?>"><br><br>
                            
                        </div>
                        <div class="col-3" >
                            
                        
                        <label>Email : </label><br><input type="email" name="email" value="<?php echo Session::get('userData')['email'] ?>"><br><br>
                        
                        <label>Gender : </label><br><select name="gender" value="<?php echo Session::get('userData')['gender'] ?>">
                              <option value="male" <?php if(Session::get('userData')['gender']=='male') echo "selected=\"selected\"";?>>Male</option>
                              <option value="female" <?php if(Session::get('userData')['gender']=='female') echo "selected=\"selected\"";?>>Female</option></select><br><br>
                        <label>City</label><br><input type="text" name="city" value="<?php if(isset(Session::get('addressData')['city'])){echo Session::get('addressData')['city'];} ?>"><br><br>

                        <input type="text" name="login_id" value="<?php echo Session::get('loginId')?>" hidden>
                        <input type="text" name="user_id" value="<?php echo Session::get('userId')?>" hidden>
                        <input type="text" name="user_type" value="<?php echo Session::get('userType')?>" hidden>
                        <input type="text" name="address_id" value="<?php echo Session::get('addressData')['address_id']?>" hidden>
                        </div>
                        <div class="col-3" >
                        <label>Address Line 1</label><br><input type="text" name="address_line_1" value="<?php if(isset(Session::get('addressData')['address_line_1'])){echo Session::get('addressData')['address_line_1'];} ?>"><br><br>
                        <label>Address Line 2</label><br><input type="text" name="address_line_2" value="<?php if(isset(Session::get('addressData')['address_line_1'])){echo Session::get('addressData')['address_line_1'];} ?>"><br><br>
                        <label>Address Line 3</label><br><input type="text" name="address_line_3" value="<?php if(isset(Session::get('addressData')['address_line_1'])){echo Session::get('addressData')['address_line_1'];} ?>"><br><br>
                    </div>
</div>
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>user" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>
    </div>
</div>