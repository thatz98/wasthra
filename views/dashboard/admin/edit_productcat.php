<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2>Edit Product Category</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>ProductCategory/editSave/" id="editFrom" method="post">
                        <div class="row">
                            <div class="col-2 pad-l-55">
                             <input type="text" name="prev_id" value="<?php echo $this->getproductcategory['category_id']?>" style="display:none">   
                            <label>Product Category Id : </label><br><input type="text" name="category_id" id="category_id" value="<?php echo $this->getproductcategory['category_id'] ?>"><br><br>
                           
                        </div>
                        <div class="col-2 pad-l-55" >
                            <label>Product Category Name : </label><br><input type="text" name="name"id="name" value="<?php echo $this->getproductcategory['name'] ?>"><br><br>
                        
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>ProductCategory" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>

                    </div>

        
</div>
</div>
<?php require 'views/footer_dashboard.php'; ?>