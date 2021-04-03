<?php require 'views/header_dashboard.php'; ?>

<link rel="stylesheet" type="text/css" href="public/css/filter_dropdown.css">

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Product Category</h2>
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


        <div class="table-search">
            <input type="text" id="keyword-input" onkeyup="filterByKeyword('productcategory-table',7)"
                   placeholder="Search & filter entire table by keyword..">
        </div>

   
    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo $this->productcatCount; ?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach(range(10,100,10) as $i){?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php }?>
        </select>
    </div>    
        
    
    <div class="table-container">
      <table id="productcategory-table">
        <thead>
          <tr>
            <th>Product Category ID<i onclick="showFilters('productcategory-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')"
                                    class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                    <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                        <div class="dropdown-filter-content">
                            <div class="close-icon">
                                <span style="float: left;">Filters:</span>
                                <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('productcategory-table',0,'asc')">
                                <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('productcategory-table',0,'desc')">
                                <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                            </div>
                            <div class="dropdown-filter-search table-search">
                                <input type="text" id="dropdown-keyword-input-1"
                                    onkeyup="filterByDropdownKeyword('productcategory-table',0,'dropdown-keyword-input-1')"
                                    placeholder="Filter by keyword..">
                            </div>
                            <div class="checkbox-container">
                                <input class="select-all" type="checkbox" id="checkbox-all-1"
                                    onchange="checkAll('productcategory-table','checkbox-all-1')" checked="true"><span>Select
                                    All</span>
                                <div id="checkbox-1">
                                </div>
                                <i class="fas fa-eraser"></i><a onclick="clearFilters('productcategory-table','checkbox-all-1')">
                                    Clear Filters</a>
                            </div>
                        </div>
                    </div></th>



            <th>Product Category Name<i onclick="showFilters('productcategory-table',1,'dropdown-filter-2','checkbox-2','checkbox-all-2')"
                                      class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                    <div class="dropdown-filter-dropdown" id="dropdown-filter-2" style="display:none;">
                        <div class="dropdown-filter-content">
                            <div class="close-icon">
                                <span style="float: left;">Filters:</span>
                                <i class="fa fa-close" onclick="closeFilter('dropdown-filter-2')"></i>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('productcategory-table',1,'asc')">
                                <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('productcategory-table',1,'desc')">
                                <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                            </div>
                            <div class="dropdown-filter-search table-search">
                                <input type="text" id="dropdown-keyword-input-2"
                                    onkeyup="filterByDropdownKeyword('productcategory-table',1,'dropdown-keyword-input-2')"
                                    placeholder="Filter by keyword..">
                            </div>
                            <div class="checkbox-container">
                                <input class="select-all" type="checkbox" id="checkbox-all-2"
                                    onchange="checkAll('productcategory-table','checkbox-all-2')" checked="true"><span>Select
                                    All</span>
                                <div id="checkbox-2">
                                </div>
                                <i class="fas fa-eraser"></i><a onclick="clearFilters('productcategory-table','checkbox-all-2')">
                                    Clear Filters</a>
                            </div>
                        </div>
                    </div></th>
       
            <th>Options</th>
          </tr>
        </thead>

        
        
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


<script type="text/javascript" src="/public/js/table_pagination.js"></script>
<script type="text/javascript" src="/public/js/form_validation.js"></script>
<script type="text/javascript" src="/util/form/ProductCategory_form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/table_filter.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/sort_table.js"></script>



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


<script>
$(pagination(10,'productcategory-table'));

$('#per-page').on('change',function() {
	var rowsPerPage = parseInt($('#per-page').val());
	pagination(rowsPerPage,'productcategory-table');
});

</script>
