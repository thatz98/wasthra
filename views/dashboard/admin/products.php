<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Products</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product</button>
            <form action="<?php echo URL; ?>user/create" id="addFrom" class="hidden-form" method="post">


                        <div class="center-btn">
                        <label allign="center">Product images : </label>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input class="btn" type="file" accept="image/*"><br>
                        </div>
                        
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <label>Product ID : </label><br><input type="text" name="first_name"><br>
                            
                            <label>Product Name : </label><br><input type="text" name="contact_no"><br>
                            <label>Product Category : </label><br><select name="user_type">
                            <option value="gents">Gents</option>
                            <option value="ladies">Ladies</option>
                            <option value="couple">Couple</option>
                        </select><br>
                        <label>Quantity : </label><br><input type="text" name="quantity"><br>
                        
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Available Sizes : </label><br><input type="text" name="available_sizes"><br>
                        
                        <label>Published : </label><br><select name="published">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        
                        
                        <label>Featured : </label><br><select name="featured">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        <label>New : </label><br><select name="new">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Colors : </label><br><input type="text" name="colors"><br>
                            <label>Price Category : </label><br><select name="price_category">
                            <option value=""></option>
                            <option value=""></option></select><br>
                            
                            <label>Description : </label><br>
                            <textarea rows="6" cols="35" name="comment"></textarea><br>

                        </div>
                    </div>
                        
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Product</button>
                        </div>
                    </form>
                    </div>
        
    
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Qty</th>
            <th>Colors</th>
            <th>Sizes</th>
            <th>Images</th>
            <th>Price</th>
            <th>Published</th>
            <th>New</th>
            <th>Featured</th>
            <th>Options</th>
        </tr>
        <!-- <?php foreach ($this->userList as $user): ?>
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
                    <td><a href="<?php echo URL ?>user/edit/<?php echo $user['nic'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>user/delete/<?php echo $user['nic'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?> -->
        
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