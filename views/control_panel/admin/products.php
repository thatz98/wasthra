<?php require 'views/header_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/filter_dropdown.css">
<div class="container">
    <div class="row">
        <h2 class="title title-min">Products</h2>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>inventory" class="btn">Manage Inventory</a><a href="<?php echo URL ?>inventory" class="btn">Generate Report</a>
    </div>
    <div class="row">
        <div class="col-3 fit-size">
            <div class="min-card primary">
                <div class="row">
                    <h3>Published Products</h3>
                </div>
                <div class="row">
                    <h1><?php echo $this->publishedCount; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card <?php if ($this->reorderCount) echo 'notify'; ?>">
                <div class="row">
                    <h3>Reordering Required</h3>
                </div>
                <div class="row">
                    <h1><?php echo $this->reorderCount; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card <?php if ($this->outStockCount) echo 'warning'; ?>">
                <div class="row">
                    <h3>Out of Stock</h3>
                </div>
                <div class="row">
                    <h1><?php echo $this->outStockCount; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <button class="btn btn-square" onclick="formToggle()">+ Add New Product</button>
        <form action="<?php echo URL; ?>products/create" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">

            <div class="row" style="margin-top:30px;">
                <div class="center-btn">
                    <div class="helper-text">
                        <label>Product images : </label>
                        <input id="image" type="file" accept="image/*" name="img[]" data-helper="Image" onfocusout="validateImage()" multiple>
                        <span class="popuptext"></span>
                        <br>

                    </div>
                </div>
            </div>
            <div class="row-top">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Product ID</label><br><input type="text" id="product_id" name="product_id" placeholder="PRDXXXX" data-helper="Product ID" onfocusout="validateProductId()">
                        <span class="popuptext"></span>
                        <br>

                    </div>
                    <div class="helper-text">
                        <label>Product Name</label><br><input type="text" id="product_name" name="product_name" data-helper="Product Name" onfocusout="validateproductName()">
                        <span class="popuptext"></span>
                        <br>

                    </div>

                    <div class="helper-text">
                        <label>Product Category</label>
                        <br>
                        <select id="category" name="category" onchange="if(this.value=='Couple'){$('#size-field').hide();$('#size-field-couple').show();} else{$('#size-field').show();$('#size-field-couple').hide();}">
                            <option value="0">Select</option>
                            <?php foreach ($this->categoryList as $category) : ?><option value="<?php echo $category['name']; ?>">
                                    <?php echo $category['name']; ?></option> <?php endforeach; ?>
                        </select>
                        <span class="popuptext"></span>
                        <br>
                    </div>

                    <!-- <div class="helper-text">
                            <label>Quantity</label><br><input id="quantity" type="text" name="quantity" data-helper="Quantity" onfocusout="validateQuantity()">
                            <span class="popuptext"></span>
                            <br>
                        </div> -->
                </div>
                <div class="col-3">
                    <!-- <div class="helper-text">
                            <div id="size-field">
                            <label>Available Sizes</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS" value="XS"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S" value="S"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M" value="M"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L" value="L"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL" value="XL"><span>XL</span>
                            </div>
                            <br>
                            </div>
                            <span class="popuptext"></span>
                            </div>
                            <div class="helper-text">
                            <div id="size-field-couple" hidden>
                            <label>Available Sizes for Couple Gents</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS-G" value="XS-G"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S-G" value="S-G"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M-G" value="M-G"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L-G" value="L-G"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL-G" value="XL-G"><span>XL</span>
                            </div>
                            <br>
                            
                            <label>Available Sizes for Couple Ladies</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS-W" value="XS-W"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S-W" value="S-W"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M-W" value="M-W"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L-W" value="L-W"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL-W" value="XL-W"><span>XL</span>
                            </div>
                            
                            <br>
                            </div>
                            </div> -->

                    <div class="helper-text">
                        <label>Published</label><br><select id="is_published" name="is_published">
                            <option value="0">Select</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>

                    <div class="helper-text">
                        <label>Featured</label><br><select id="is_featured" name="is_featured">
                            <option value="0">Select</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>

                    <div class="helper-text">
                        <label>New</label><br><select id="is_new" name="is_new">
                            <option value="0">Select</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>

                </div>
                <div class="col-3">
                    <!-- <div class="helper-text">
                                <label>Colors</label><br>
                                <input id="color" type="text" name="colors" placeholder="#12ab87,#abc123" data-helper="Colors" onfocusout="validateColors()">
                                <span class="popuptext"></span>
                                <br>
                                    
                            </div> -->

                    <div class="helper-text">
                        <label>Price Category</label><br>
                        <select id="price_category" name="price_category">
                            <option value="0">Select</option>
                            <?php foreach ($this->pricecategoryList as $priceCategory) : ?>
                                <option value="<?php echo $priceCategory['price_category_name']; ?>">
                                    <?php echo $priceCategory['price_category_name']; ?>
                                </option> <?php endforeach; ?>
                        </select>
                        <span class="popuptext"></span>
                        <br>
                    </div>

                    <div class="helper-text">
                        <label>Description</label><br>
                        <textarea id="description" rows="6" cols="30" name="product_description" data-helper="Description" onfocusout="validateDescription()"></textarea>
                        <span class="popuptext"></span>
                        <br>
                    </div>
                </div>
            </div>

            <div class="center-btn">
                <button type="submit" class="btn">Add New Product</button>
            </div>
        </form>
    </div>

    <div class="table-search">
        <input type="text" id="keyword-input" onkeyup="filterByKeyword('product-table',10)" placeholder="Search & filter entire table by keyword..">
    </div>

    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo count($this->totProducts[0]); ?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach (range(10, 100, 10) as $i) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="table-container">
        <table id="product-table">
            <thead>
                <tr>
                    <th>ID
                        <i onclick="showFilters('product-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',0,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',0,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('product-table',0,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('product-table','checkbox-all-1')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-1">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-1')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Name
                        <i onclick="showFilters('product-table',1,'dropdown-filter-2','checkbox-2','checkbox-all-2')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-2" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-2')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',1,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',1,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-2" onkeyup="filterByDropdownKeyword('product-table',0,'dropdown-keyword-input-2')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('product-table','checkbox-all-2')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-2">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-2')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Category
                        <i onclick="showFilters('product-table',2,'dropdown-filter-3','checkbox-3','checkbox-all-3')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-3" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-3')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',2,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',2,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-3" onkeyup="filterByDropdownKeyword('product-table',2,'dropdown-keyword-input-3')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-3" onchange="checkAll('product-table','checkbox-all-3')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-3">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-3')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Qty
                        <i onclick="showFilters('product-table',3,'dropdown-filter-4','checkbox-4','checkbox-all-4')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-4" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-4')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',3,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',3,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-4" onkeyup="filterByDropdownKeyword('product-table',3,'dropdown-keyword-input-4')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-4" onchange="checkAll('product-table','checkbox-all-4')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-4">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-4')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Colors
                        <i onclick="showFilters('product-table',4,'dropdown-filter-5','checkbox-5','checkbox-all-5')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-5" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-5')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',4,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',4,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-5" onkeyup="filterByDropdownKeyword('product-table',4,'dropdown-keyword-input-5')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-5" onchange="checkAll('product-table','checkbox-all-5')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-5">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-5')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Sizes
                        <i onclick="showFilters('product-table',5,'dropdown-filter-6','checkbox-6','checkbox-all-6')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-6" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-6')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',5,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',5,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-6" onkeyup="filterByDropdownKeyword('product-table',5,'dropdown-keyword-input-6')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-6" onchange="checkAll('product-table','checkbox-all-6')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-6">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-6')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Images</th>
                    <th>Price
                        <i onclick="showFilters('product-table',7,'dropdown-filter-7','checkbox-7','checkbox-all-7')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-7" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-7')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',7,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',7,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-7" onkeyup="filterByDropdownKeyword('product-table',7,'dropdown-keyword-input-7')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-7" onchange="checkAll('product-table','checkbox-all-7')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-7">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-7')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Published
                        <i onclick="showFilters('product-table',8,'dropdown-filter-8','checkbox-8','checkbox-all-8')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-8" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-8')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',8,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',8,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-8" onkeyup="filterByDropdownKeyword('product-table',8,'dropdown-keyword-input-8')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-8" onchange="checkAll('product-table','checkbox-all-8')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-8">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-8')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>New
                        <i onclick="showFilters('product-table',9,'dropdown-filter-9','checkbox-9','checkbox-all-9')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-9" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-9')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',9,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',9,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-9" onkeyup="filterByDropdownKeyword('product-table',9,'dropdown-keyword-input-9')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-9" onchange="checkAll('product-table','checkbox-all-9')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-9">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-9')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Featured
                        <i onclick="showFilters('product-table',10,'dropdown-filter-10','checkbox-10','checkbox-all-10')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-10" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-10')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',10,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('product-table',10,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-10" onkeyup="filterByDropdownKeyword('product-table',10,'dropdown-keyword-input-10')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-10" onchange="checkAll('product-table','checkbox-all-10')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-10">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('product-table','checkbox-all-10')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th style="min-width:50px;">Options</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->allProducts as $all) : ?>
                    <tr>
                        <td><?php echo $all['product_id']; ?></td>
                        <td><?php echo $all['product_name']; ?></td>
                        <td><?php echo $all['name']; ?></td>
                        <td><?php $totalQuantity = 0;
                            foreach ($this->totQuantity as $quantity) {
                                if ($all['product_id'] == $quantity['product_id']) {
                                    $totalQuantity += $quantity['qty'];
                                }
                            }
                            echo $totalQuantity; ?>
                        </td>
                        <td><?php $colorString = '';
                            foreach ($all['product_colors'] as $color) {

                                // if($qty['product_id']==$color['product_id']){
                                //     $colorString .= $color['colors']; 
                                //     $colorString .= " | "; 
                            ?>
                                <div class="tooltip">

                                    <span class="color-dot no-mar-right" style="background-color: <?php echo $color ?>" tool-tip=></span>
                                    <span class="tooltiptext"><?php echo $color ?></span>
                                </div>
                            <?php //}

                            }
                            //echo rtrim($colorString," | ");
                            // if($colorString==''){
                            //     echo "Colors not set";
                            // }
                            ?>

                        </td>
                        <td style="max-width: 150px;"><?php $sizeString = '';
                                                        foreach ($all['product_sizes'] as $size) {
                                                            //if($qty['product_id']==$size['product_id']){
                                                            $sizeString .= $size;
                                                            $sizeString .= " | ";
                                                            //}
                                                        }
                                                        echo rtrim($sizeString, " | ");
                                                        if ($sizeString == '') {
                                                            echo "Sizes not set";
                                                        }
                                                        ?></td>
                        <td><?php foreach ($all['product_images'] as $image) {
                                //if($qty['product_id']==$image['product_id']){
                            ?>
                                <img src="<?php echo $image ?>" width="50px" height="50px">
                            <?php
                                //}
                            } ?>
                        </td>
                        <td><?php echo $all['product_price']; ?></td>
                        <td><?php echo $all['is_published']; ?></td>
                        <td><?php echo $all['is_featured']; ?></td>
                        <td><?php echo $all['is_new']; ?></td>
                        <td style="min-width:50px;"><a href="<?php echo URL ?>products/productDetails/<?php echo $all['product_id'] ?>"><button class="table-btn btn-blue">View</button></a></td>

                    </tr>

                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <div class="pagination">
        <ol id="numbers"></ol>
    </div>
</div>

<script type="text/javascript" src="<?php echo URL ?>public/js/table_pagination.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/products_form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/table_filter.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/sort_table.js"></script>
<script>
    $(pagination(10, 'product-table'));

    $('#per-page').on('change', function() {
        var rowsPerPage = parseInt($('#per-page').val());
        pagination(rowsPerPage, 'product-table');
    });
</script>
<script>
    //  var addFrom = document.getElementByClassName("dash-form-container");
    var addFrom = document.getElementById("addFrom");
    addFrom.style.maxHeight = "0px";
    addFrom.style.overflow = "0px";

    function formToggle() {
        if (addFrom.style.maxHeight == "0px") {
            addFrom.style.maxHeight = "none";
        } else {
            addFrom.style.maxHeight = "0px";
        }
    }
</script>

<?php require 'views/footer_dashboard.php'; ?>