<h1>Users</h1>

<button class="btn" onclick="formToggle()">+ Add New User</button>

<form action="<?php echo URL; ?>user/create" id="addFrom" method="post">
                        <label>First Name : </label><input type="text" name="first_name"><br>
                        <label>Last Name : </label><input type="text" name="last_name"><br>
                        <label>NIC : </label><input type="text" name="nic"><br>
                        <label>Email : </label><input type="email" name="email"><br>
                        <label>Mobile Number : </label><input type="text" name="contact_no"><br>
                        <label>Gender : </label><select name="gender">
                        	<option value="male">Male</option>
                        	<option value="female">Female</option></select><br>
                        <label>User Type : </label><select name="user_type">
                        	<option value="customer">Customer</option>
                        	<option value="admin">Admin</option>
                        	<option value="owner">Owner</option>
                        	<option value="delivery">Delivery</option>
                        </select><br>
                        <label>User Status : </label><select name="user_status">
                        	<option value="new">New</option>
                        	<option value="verified">Verified</option>
                        	<option value="blocked">Blocked</option>
                        	<option value="retired">Retired</option>
                        </select><br>
                        <label>Password : </label><input type="password" name="password"><br>
                        <label>Confirm Password : </label><input type="password" name="conf_password"><br>
                        <button type="submit" class="btn">Register</button>
                    </form>

<table>
	<?php foreach ($this->userList as $user): ?>
			<tr>
				<td><?php echo $user['nic']; ?></td>
    	  			<td><?php echo $user['first_name']; ?></td>
    	  			<td><?php echo $user['last_name']; ?></td>
    	  			<td><?php echo $user['gender']; ?></td>
    	  			<td><?php echo $user['email']; ?></td>
    	  			<td><?php echo $user['contact_no']; ?></td>
    	  			<td><?php echo $user['user_type']; ?></td>
    	  			<td><?php echo $user['user_status']; ?></td>
    	  			<td><a href="<?php echo URL ?>user/edit/<?php echo $user['nic'] ?>">Edit</a>
    	  			<a href="<?php echo URL ?>user/delete/<?php echo $user['nic'] ?>">Delete</a></td>
			
			</tr>

		<?php endforeach;?>
</table>

<script>
        var addFrom = document.getElementById("addFrom");
        addFrom.style.maxHeight = "0px";

        function formToggle(){
if(addFrom.style.maxHeight == "0px"){
    addFrom.style.maxHeight = "300px";
} else{
    addFrom.style.maxHeight = "0px";
}
        }
    </script>