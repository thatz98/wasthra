<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Products</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product</button>
            <form action="<?php echo URL; ?>products/create" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">


                        <div class="center-btn">
                        <label allign="center">Product images : </label>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input type="file" accept="image/*" name="img[]" multiple><br>
                        </div>
                        
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <label>Product ID : </label><br><input type="text" name="product_id"><br>
                            
                            <label>Product Name : </label><br><input type="text" name="product_name"><br>
                            <label>Product Category : </label><br><select name="category">
                            <?php foreach ($this->categoryList as $category): ?><option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option> <?php endforeach;?>
                            <!-- <option value="ladies">Ladies</option>
                            <option value="couple">Couple</option> -->
                        </select><br>
                        <label>Quantity : </label><br><input type="text" name="quantity"><br>
                        
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Available Sizes : </label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XS"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="S"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="M"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="L"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XL"><span>XL</span>
                            </div>
                            <br>
                            
                            
                            
                        
                        <label>Published : </label><br><select name="is_published">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        
                        
                        <label>Featured : </label><br><select name="is_featured">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        <label>New : </label><br><select name="is_new">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Colors : </label><br><input type="text" name="colors"><br>
                            <label>Price Category : </label><br><select name="price_category">
                            <?php foreach ($this->pricecategoryList as $priceCategory): ?><option value="<?php echo $priceCategory['price_category_name']; ?>"><?php echo $priceCategory['price_category_name']; ?></option> <?php endforeach;?>
                            </select><br>
                            
                            <label>Description : </label><br>
                            <textarea rows="6" cols="30" name="product_description"></textarea><br>

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
        <?php foreach ($this->qtyList as $qty): ?>
            <tr>
                <td><?php echo $qty['product_id']; ?></td>
                <td><?php echo $qty['product_name']; ?></td>
                    <td><?php echo $qty['name']; ?></td>
                    <td><?php echo $qty['qty']; ?></td>
                    <td><?php foreach ($this->colorList as $color): ?><?php if($qty['product_id']==$color['product_id']){echo $color['colors']; echo ("  "); }?><?php endforeach;?></td>
                    <td><?php foreach ($this->sizeList as $size): ?><?php if($qty['product_id']==$size['product_id']){echo $size['sizes']; echo ('  ');}?><?php endforeach;?></td>
                    <td><?php foreach ($this->imageList as $image){
                        if($qty['product_id']==$image['product_id']){?>
                            <img src="<?php echo $image['image']?>" width="50px" height="50px">
                            <?php 
                        }
                    }?></td>
                    <td><?php echo $qty['product_price']; ?></td>
                    <td><?php echo $qty['is_published']; ?></td>
                    <td><?php echo $qty['is_featured']; ?></td>
                    <td><?php echo $qty['is_new']; ?></td>
                    <td><a href="<?php echo URL ?>products/edit/<?php echo $qty['product_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>products/delete/<?php echo $qty['product_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
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