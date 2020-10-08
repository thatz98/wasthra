<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2>Users</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New User</button>
            <form action="<?php echo URL; ?>user/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row">
                            <div class="col-2 pad-10">
                            <label>First Name : </label><input type="text" name="first_name"><br>
                            <label>NIC : </label><input type="text" name="nic"><br>
                            <label>Mobile Number : </label><input type="text" name="contact_no"><br>
                            <label>User Type : </label><select name="user_type">
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                            <option value="owner">Owner</option>
                            <option value="delivery">Delivery</option>
                        </select><br>
                        <label>Password : </label><input type="password" name="password"><br>
                        </div>
                        <div class="col-2 pad-10">
                            <label>Last Name : </label><input type="text" name="last_name"><br>
                        
                        <label>Email : </label><input type="email" name="email"><br>
                        
                        <label>Gender : </label><select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option></select><br>
                        
                        <label>User Status : </label><select name="user_status">
                            <option value="new">New</option>
                            <option value="verified">Verified</option>
                            <option value="blocked">Blocked</option>
                            <option value="retired">Retired</option>
                        </select><br>
                        
                        <label>Confirm Password : </label><input type="password" name="conf_password"><br>
                        </div>
                    </div>
                        
                        <div class="center-btn">
                            <button type="submit" class="btn">Add</button>
                        </div>
                    </form>
                    </div>
        
    
    <table>
        <tr>
            <th>NIC</th>
            <th>User Type</th>
            <th>User Status</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Contact No.</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Options</th>
        </tr>
        <?php foreach ($this->userList as $user): ?>
            <tr>
                <td><?php echo $user['nic']; ?></td>
                <td><?php echo $user['user_type']; ?></td>
                    <td><?php echo $user['user_status']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['contact_no']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="<?php echo URL ?>user/edit/<?php echo $user['nic'] ?>"><button class="table-btn edit-btn">Edit</button></a>
                    <a href="<?php echo URL ?>user/delete/<?php echo $user['nic'] ?>"><button class="table-btn delete-btn">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
        
    </table>
</div>

<script>
      //  var addFrom = document.getElementByClassName("dash-form-container");
        var addFrom = document.getElementById("addFrom");
        addFrom.style.maxHeight = "0px";
        addFrom.style.overflow = "0px";

        function formToggle(){
if(addFrom.style.maxHeight == "0px"){
    addFrom.style.maxHeight = "none";
} else{
    addFrom.style.maxHeight = "0px";
}
        }
    </script>