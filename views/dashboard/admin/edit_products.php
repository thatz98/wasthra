<?php require 'views/header_dashboard.php'; ?>   
   
   
   <div class="row">
        <h2>Edit Products</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            
            <form action="<?php echo URL; ?>products/edit/<?php echo $this->products['product_id'] ?>" id="editFrom" method="post">


                        <div class="center-btn">
                        <label allign="center">Product images : </label>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input class="btn" type="file" accept="image/*"><br>
                        </div>
                        
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <label>Product ID : </label><br><input type="text" name="first_name" value="<?php echo $this->product['product_id'] ?>" ><br>
                            
                            <label>Product Name : </label><br><input type="text" name="contact_no"><br>
                            <label>Product Category : </label><br><select name="user_type">
                            <option value="gents">Gents</option>
                            <option value="ladies">Ladies</option>
                            <option value="couple">Couple</option>
                        </select><br>
                        <label>Quantity : </label><br><input type="text" name="quantity"><br>
                        
                        
                        
                            <label>Available Sizes : </label><br><input type="text" name="available_sizes"><br>
                        
                        <label>Published : </label><br><select name="published">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        </div>
                        <div class="col-3 pad-30-0-0-85">

                        <label>Featured : </label><br><select name="featured">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        <label>New : </label><br><select name="new">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        
                        
                            <label>Colors : </label><br><input type="text" name="colors"><br>
                            <label>Price Category : </label><br><select name="price_category">
                            <option value=""></option>
                            <option value=""></option></select><br>
                            
                            <label>Description : </label><br>
                            <textarea rows="6" cols="20" name="comment"></textarea><br>

                        </div>
                    </div>
                        
                    <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>products" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>
                    </div>
</div>