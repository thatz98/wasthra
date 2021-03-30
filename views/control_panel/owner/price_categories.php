<?php require 'views/header_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="public/css/filter_dropdown.css">
<div class="container">
    <div class="row">
        <h2 class="title title-min">Price Categories</h2>
    </div>
    <div class="">
        <button class="btn btn-square" onclick="formToggle()">+ Add New Category</button>
        <form action="<?php echo URL; ?>priceCategories/create" id="addFrom" class="hidden-form" method="post">

            <div class="row-top">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Price Category ID</label><br>
                        <input type="text" name="category_id" id="category_id" data-helper="Category ID" onfocusout="validateCategoryId()" placeholder="PRCXXXX">
                        <span class="popuptext"></span>
                    </div><br><br><br>
                    <div class="helper-text">
                        <label>Production Cost</label><br>
                        <input type="text" name="production_cost" id="production_cost" placeholder="LKR" data-helper="Cost" onfocusout="validateProductionCost()">
                        <span class="popuptext"></span>
                    </div><br>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Price Category Name</label><br>
                        <input type="text" name="category_name" id="category_name" data-helper="Category Name" onfocusout="validateCategoryName()">
                        <span class="popuptext"></span>
                    </div><br><br><br>
                    <div class="helper-text">
                        <label>Additional Market Price </label><br>
                        <input type="text" name="market_price" id="market_price" placeholder="LKR" data-helper="Market Price" onfocusout="validateMarketPrice()">
                        <span class="popuptext"></span>
                    </div><br>
                </div>

                <script type="text/javascript">
                    //Calculating Reatail price  & Net price
                    function calculateRetail() {
                        document.getElementById('retail-display').innerHTML = parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value);
                    }

                    function calculateNet() {
                        document.getElementById('net-display').innerHTML = ((parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value)) * (100 - parseFloat(document.getElementById('discount').value))) / 100;
                    }
                </script>
            </div>

            <div class="center-btn">
                <span onclick="calculateRetail()" class="btn btn-grey">Calculate Retail Price</span>
            </div>

            <div class="center-content" style="margin-bottom: 20px;">
                <label>Reatil Price : LKR&nbsp;</label><br>
                <div id="retail-display">

                </div><br>
            </div>

            <div class="center-content pad-auto">
                <label>Discount: </label><br>
                <input type="text" name="discount" id="discount" data-helper="Discount" onfocusout="validateDiscount()">%
                <span class="popuptext"></span><br>
            </div>

            <div class="center-btn">
                <span onclick="calculateNet()" class="btn btn-grey">Calculate Net Price</span>
            </div>

            <div class="center-content">
                <label>Net Price : LKR&nbsp;</label><br>
                <div id="net-display">

                </div><br>
            </div><br>

            <div class="center-btn">
                <button type="submit" class="btn">Add Price Category</button>
            </div>
        </form>
    </div>

    <div class="table-search">
        <input type="text" id="keyword-input" onkeyup="filterByKeyword('pricecategory-table',7)" placeholder="Search & filter entire table by keyword..">
    </div>

    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo $this->pricecatCount; ?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach (range(10, 100, 10) as $i) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="table-container">
        <table id="pricecategory-table">
            <thead>
                <tr>
                    <th>Price Category ID<i onclick="showFilters('pricecategory-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',0,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',0,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('pricecategory-table',0,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('pricecategory-table','checkbox-all-1')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-1">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-1')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Price Category Name<i onclick="showFilters('pricecategory-table',1,'dropdown-filter-2','checkbox-2','checkbox-all-2')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-2" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-2')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',1,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',1,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-2" onkeyup="filterByDropdownKeyword('pricecategory-table',1,'dropdown-keyword-input-2')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-2" onchange="checkAll('pricecategory-table','checkbox-all-2')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-2">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-2')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Production Cost<i onclick="showFilters('pricecategory-table',2,'dropdown-filter-3','checkbox-3','checkbox-all-3')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-3" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-3')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',2,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',2,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-3" onkeyup="filterByDropdownKeyword('pricecategory-table',2,'dropdown-keyword-input-3')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-3" onchange="checkAll('pricecategory-table','checkbox-all-3')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-3">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-3')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Additional Market Prices<i onclick="showFilters('pricecategory-table',3,'dropdown-filter-4','checkbox-4','checkbox-all-4')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-4" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-4')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',3,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',3,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-4" onkeyup="filterByDropdownKeyword('pricecategory-table',3,'dropdown-keyword-input-4')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-4" onchange="checkAll('pricecategory-table','checkbox-all-4')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-4">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-4')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Retail Price<i onclick="showFilters('pricecategory-table',4,'dropdown-filter-5','checkbox-5','checkbox-all-5')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-5" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-5')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',4,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',4,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-5" onkeyup="filterByDropdownKeyword('pricecategory-table',4,'dropdown-keyword-input-5')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-5" onchange="checkAll('pricecategory-table','checkbox-all-5')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-5">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-5')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>Discount<i onclick="showFilters('pricecategory-table',5,'dropdown-filter-6','checkbox-6','checkbox-all-6')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-6" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-6')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',5,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',5,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-6" onkeyup="filterByDropdownKeyword('pricecategory-table',5,'dropdown-keyword-input-6')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-6" onchange="checkAll('pricecategory-table','checkbox-all-6')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-6">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-6')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Net Price<i onclick="showFilters('pricecategory-table',6,'dropdown-filter-7','checkbox-7','checkbox-all-7')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-7" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-7')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',6,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('pricecategory-table',6,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-7" onkeyup="filterByDropdownKeyword('pricecategory-table',6,'dropdown-keyword-input-7')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-7" onchange="checkAll('pricecategory-table','checkbox-all-7')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-7">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('pricecategory-table','checkbox-all-7')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Options</th>
                </tr>
            </thead>

            <?php foreach ($this->pricecatList as $price_category) : ?>
                <tr>
                    <td><?php echo $price_category['price_category_id']; ?></td>
                    <td><?php echo $price_category['price_category_name']; ?></td>
                    <td>LKR <?php echo $price_category['production_cost']; ?></td>
                    <td>LKR <?php echo $price_category['add_market_price']; ?></td>
                    <td>LKR <?php echo number_format($price_category['production_cost'] + $price_category['add_market_price'], 2, '.', ''); ?></td>
                    <td><?php echo $price_category['discount']; ?>%</td>
                    <td>LKR <?php echo number_format((($price_category['production_cost'] + $price_category['add_market_price']) * (100 - $price_category['discount'])) / 100, 2, '.', ''); ?></td>

                    <td>
                        <a href="<?php echo URL ?>priceCategories/edit/<?php echo $price_category['price_category_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                        <a href="<?php echo URL ?>priceCategories/delete/<?php echo $price_category['price_category_id'] ?>"><button class="table-btn btn-red">Delete</button></a>
                    </td>

                </tr>

            <?php endforeach; ?>
        </table>
    </div>

    <div class="pagination">
        <ol id="numbers"></ol>

    </div>
</div>
<script type="text/javascript" src="/wasthra/public/js/table_pagination.js"></script>


<script>
    $(pagination(10, 'pricecategory-table'));

    $('#per-page').on('change', function() {
        var rowsPerPage = parseInt($('#per-page').val());
        pagination(rowsPerPage, 'pricecategory-table');
    });
</script>

<script>
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


<script type="text/javascript" src="/wasthra/public/js/table_filter.js"></script>
<script type="text/javascript" src="/wasthra/public/js/sort_table.js"></script>
<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/price_category_form_validation.js"></script>


<?php require 'views/footer.php'; ?>