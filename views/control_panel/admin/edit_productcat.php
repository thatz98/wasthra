<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit Product Category</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>ProductCategories/editSave/" id="editFrom" method="post">
                        <div class="row">
                            <div class="col-2">
                            <div class="helper-text">
                             <input type="text" name="prev_id" value="<?php echo $this->getproductcategory['category_id']?>" style="display:none">   
                            <label>Product Category Id</label><br><input type="text" name="product_category_id" id="category_id" data-helper="Category ID" onfocusout="validateCategorytId()" placeholder="CATXXXX"
                             value="<?php echo $this->getproductcategory['category_id'] ?>">
                             <span class="popuptext"></span>
                             <br><br>
                            </div>
                        </div>
                        <div class="col-2" >
                        <div class="helper-text">
                            <label>Product Category Name</label><br><input type="text" name="category_name" id="category_name" data-helper="Category Name" onfocusout="validateCategoryName()" 
                            value="<?php echo $this->getproductcategory['name'] ?>">
                            <span class="popuptext"></span>
                            <br><br>
                        </div>
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>ProductCategories" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>

                    </div>

        
</div>
</div>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/edit_ProductCategory_form_validation.js"></script>
<?php require 'views/footer_dashboard.php'; ?>