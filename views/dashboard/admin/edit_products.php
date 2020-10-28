<?php require 'views/header_dashboard.php'; ?>   
    
   
   <div class="row">
        <h2>Edit Products</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            
            <form action="<?php echo URL; ?>products/editSave/<?php echo $this->product['product_id'] ?>" enctype="multipart/form-data" id="editFrom" method="post">


                        <div class="center-btn">
                        <label allign="center">Product images : </label>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input type="file" accept="image/*" name="img[]" multiple><br>
                        </div>
                        
                        <div class="row-top">
                            <div class="col-2 pad-30-0-0-85">
                            <input type="text" name="prev_id" value="<?php echo $this->product['product_id']?>" style="display:none">
                            <label>Product ID : </label><br><input type="text" name="product_id" value="<?php echo $this->product['product_id'] ?>" ><br>
                            
                            <label>Product Name : </label><br><input type="text" name="product_name" value="<?php echo $this->product['product_name'] ?>"><br>
                            <label>Product Category : </label><br><select name="category" >
                            <?php foreach ($this->product_category as $category): ?><option value="<?php echo $category['name']; ?>" <?php if($this->product['category_id']==$category['category_id']) echo "selected=\"selected\"";?>><?php echo $category['name']; ?></option> <?php endforeach;?>

                        </select><br>
                        <label>Quantity : </label><br><input type="text" name="quantity" value="<?php foreach ($this->quantity as $qty): ?><?php if($qty['product_id']==$this->product['product_id']){echo $qty['qty'];}?><?php endforeach;?>"><br>
                        
                        
                        
                            <label>Available Sizes : </label><br>
                            <?php $this->allSizes=array('XS','S','M','L','XL');
                            //$this->mySizes=array('S','M','L');
                            foreach ($this->allSizes as $item) {
                                if(in_array($item,$this->sizes)){?>
                                    <input type="checkbox" name="size[]" value="<?php echo $item?>" checked><?php echo $item?>
                                    <?php
                                } else{
                                    ?>
                                    <input type="checkbox" name="size[]" value="<?php echo $item?>"><?php echo $item?>
                                    <?php
                                }
                            } ?>
                            <br>
                        
                        <label>Published : </label><br><select name="is_published">
                            <option value="yes" <?php if($this->product['is_published']=='yes') echo "selected=\"selected\"";?>>YES</option>
                            <option value="no"  <?php if($this->product['is_published']=='no') echo "selected=\"selected\"";?>>NO</option>
                        </select><br>
                        
                        </div>
                        <div class="col-2 pad-30-0-0-85">

                        <label>Featured : </label><br><select name="is_featured">
                            <option value="yes"  <?php if($this->product['is_featured']=='yes') echo "selected=\"selected\"";?>>YES</option>
                            <option value="no"  <?php if($this->product['is_featured']=='no') echo "selected=\"selected\"";?>>NO</option>
                        </select><br>
                        
                        <label>New : </label><br><select name="is_new">
                            <option value="yes"  <?php if($this->product['is_new']=='yes') echo "selected=\"selected\"";?>>YES</option>
                            <option value="no"  <?php if($this->product['is_new']=='no') echo "selected=\"selected\"";?>>NO</option>
                        </select><br>
                        
                        
                        
                            <label>Colors : </label><br><input type="text" name="colors" value="<?php foreach ($this->product_colors as $color): ?><?php if($this->product['product_id']==$color['product_id']){echo $color['colors']; echo (","); }?><?php endforeach;?>"><br>
                            <label>Price Category : </label><br><select name="price_category">
                            <?php foreach ($this->price_category as $price): ?><option value="<?php echo $price['price_category_name']; ?>" <?php if($this->product['price_category_id']==$price['price_category_id']) echo "selected=\"selected\"";?>><?php echo $price['price_category_name']; ?></option> <?php endforeach;?>


                            
                            <label>Description : </label><br>
                            <textarea rows="6" cols="20" name="product_description" ><?php echo $this->product['product_description'] ?></textarea><br>

                        </div>
                    </div>
                        
                    <div class="center-content">

                            <button type="submit"class="btn">Update</button>
                            <a href="<?php echo URL ?>products" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>
                    </div>
</div>