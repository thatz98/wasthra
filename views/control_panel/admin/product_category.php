<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Product Category</h2>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report" class="btn">Generate Report</a>
    </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product Category</button>
            <form action="<?php echo URL; ?>ProductCategories/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <div class="helper-text">
                                <label>Product Category Id</label><br><input type="text" id="product_category_id" name="product_category_id"
                                 data-helper="Category ID" onfocusout="validateCategorytId()" placeholder="CATXXXX">
                                <span class="popuptext"></span>
                                <br>
                            </div>    
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                        <div class="helper-text">
                            <label>Product Category Name</label><br><input type="text" id="category_name" name="category_name"
                             data-helper="Category Name" onfocusout="validateCategoryName()">
                            <span class="popuptext"></span>
                            <br>
                        </div>    
                        </div>
                        </div>
                        <div row>
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Category</button>
                        </div>
                        </div>
                    </form>
                    </div>
        
    
    <div class="table-container">
    <table>
        <tr>
            <th>Product Category Id</th>
            <th>Product Category Name</th>
            <th>Option</th>
            
        </tr>
        <?php foreach ($this->productcatList as $product_category): ?>
            <tr>
                <td><?php echo $product_category['category_id']; ?></td>
                <td><?php echo $product_category['name']; ?></td>
                
                    <td><a href="<?php echo URL ?>ProductCategories/edit/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>ProductCategories/delete/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
        

          
        
    </table>
</div>
</div>
</div>

<script type="text/javascript" src="/wasthra/public/js/table_pagination.js"></script>
<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/ProductCategory_form_validation.js"></script>

<?php require 'views/footer_dashboard.php'; ?>
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
