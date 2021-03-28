<?php require 'views/header_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="/wasthra/public/css/filter_dropdown.css">
<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Inventory</h2>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report/generateInventoryReport" class="btn">Generate Report</a>
    </div>
    <div class="table-search">
        <input type="text" id="keyword-input" onkeyup="filterByKeyword('inventory-table',6)" placeholder="Search & filter entire table by keyword..">
    </div>

    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo $this->totProducts[0][0]; ?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach (range(10, 100, 10) as $i) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="table-container">
        <div class="center-content">
            <table id="inventory-table">
                <thead>
                    <tr>
                        <th>Product ID
                            <i onclick="showFilters('inventory-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                            <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                                <div class="dropdown-filter-content">
                                    <div class="close-icon">
                                        <span style="float: left;">Filters:</span>
                                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',0,'asc')">
                                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',0,'desc')">
                                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                    </div>
                                    <div class="dropdown-filter-search table-search">
                                        <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('inventory-table',0,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                                    </div>
                                    <div class="checkbox-container">
                                        <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('inventory-table','checkbox-all-1')" checked="true"><span>Select
                                            All</span>
                                        <div id="checkbox-1">
                                        </div>
                                        <i class="fas fa-eraser"></i><a onclick="clearFilters('inventory-table','checkbox-all-1')">
                                            Clear Filters</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>Color
                        </th>
                        <th>Size
                            <i onclick="showFilters('inventory-table',2,'dropdown-filter-3','checkbox-3','checkbox-all-3')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                            <div class="dropdown-filter-dropdown" id="dropdown-filter-3" style="display:none;">
                                <div class="dropdown-filter-content">
                                    <div class="close-icon">
                                        <span style="float: left;">Filters:</span>
                                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-3')"></i>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',2,'asc')">
                                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',2,'desc')">
                                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                    </div>
                                    <div class="dropdown-filter-search table-search">
                                        <input type="text" id="dropdown-keyword-input-3" onkeyup="filterByDropdownKeyword('inventory-table',2,'dropdown-keyword-input-3')" placeholder="Filter by keyword..">
                                    </div>
                                    <div class="checkbox-container">
                                        <input class="select-all" type="checkbox" id="checkbox-all-3" onchange="checkAll('inventory-table','checkbox-all-3')" checked="true"><span>Select
                                            All</span>
                                        <div id="checkbox-3">
                                        </div>
                                        <i class="fas fa-eraser"></i><a onclick="clearFilters('inventory-table','checkbox-all-3')">
                                            Clear Filters</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>Quantity
                            <i onclick="showFilters('inventory-table',3,'dropdown-filter-4','checkbox-4','checkbox-all-4')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                            <div class="dropdown-filter-dropdown" id="dropdown-filter-4" style="display:none;">
                                <div class="dropdown-filter-content">
                                    <div class="close-icon">
                                        <span style="float: left;">Filters:</span>
                                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-4')"></i>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',3,'asc')">
                                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',3,'desc')">
                                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                    </div>
                                    <div class="dropdown-filter-search table-search">
                                        <input type="text" id="dropdown-keyword-input-4" onkeyup="filterByDropdownKeyword('inventory-table',3,'dropdown-keyword-input-4')" placeholder="Filter by keyword..">
                                    </div>
                                    <div class="checkbox-container">
                                        <input class="select-all" type="checkbox" id="checkbox-all-4" onchange="checkAll('inventory-table','checkbox-all-4')" checked="true"><span>Select
                                            All</span>
                                        <div id="checkbox-4">
                                        </div>
                                        <i class="fas fa-eraser"></i><a onclick="clearFilters('inventory-table','checkbox-all-4')">
                                            Clear Filters</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>Reorder Level
                            <i onclick="showFilters('inventory-table',4,'dropdown-filter-5','checkbox-5','checkbox-all-5')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                            <div class="dropdown-filter-dropdown" id="dropdown-filter-5" style="display:none;">
                                <div class="dropdown-filter-content">
                                    <div class="close-icon">
                                        <span style="float: left;">Filters:</span>
                                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-5')"></i>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',4,'asc')">
                                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',4,'desc')">
                                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                    </div>
                                    <div class="dropdown-filter-search table-search">
                                        <input type="text" id="dropdown-keyword-input-5" onkeyup="filterByDropdownKeyword('inventory-table',4,'dropdown-keyword-input-5')" placeholder="Filter by keyword..">
                                    </div>
                                    <div class="checkbox-container">
                                        <input class="select-all" type="checkbox" id="checkbox-all-5" onchange="checkAll('inventory-table','checkbox-all-5')" checked="true"><span>Select
                                            All</span>
                                        <div id="checkbox-5">
                                        </div>
                                        <i class="fas fa-eraser"></i><a onclick="clearFilters('inventory-table','checkbox-all-5')">
                                            Clear Filters</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>Reorder Quantity
                            <i onclick="showFilters('inventory-table',5,'dropdown-filter-6','checkbox-6','checkbox-all-6')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                            <div class="dropdown-filter-dropdown" id="dropdown-filter-5" style="display:none;">
                                <div class="dropdown-filter-content">
                                    <div class="close-icon">
                                        <span style="float: left;">Filters:</span>
                                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-6')"></i>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',5,'asc')">
                                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                    </div>
                                    <div class="dropdown-filter-sort" onclick="sortTable('inventory-table',5,'desc')">
                                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                    </div>
                                    <div class="dropdown-filter-search table-search">
                                        <input type="text" id="dropdown-keyword-input-6" onkeyup="filterByDropdownKeyword('inventory-table',5,'dropdown-keyword-input-6')" placeholder="Filter by keyword..">
                                    </div>
                                    <div class="checkbox-container">
                                        <input class="select-all" type="checkbox" id="checkbox-all-6" onchange="checkAll('inventory-table','checkbox-all-6')" checked="true"><span>Select
                                            All</span>
                                        <div id="checkbox-6">
                                        </div>
                                        <i class="fas fa-eraser"></i><a onclick="clearFilters('inventory-table','checkbox-all-6')">
                                            Clear Filters</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>Option</th>

                    </tr>
                </thead>
                <?php foreach ($this->inventoryDetails as $inventory) : ?>
                    <tr>
                        <td><?php echo $inventory['product_id']; ?></td>
                        <td>
                            <div class="tooltip">

                                <span class="color-dot no-mar-right" style="background-color: <?php echo $inventory['color'] ?>" tool-tip=></span>
                                <span class="tooltiptext"><?php echo $inventory['color'] ?></span>

                            </div>
                        </td>
                        <td><?php echo $inventory['size']; ?></td>
                        <td><?php echo $inventory['qty']; ?></td>
                        <td><?php if (empty($inventory['reorder_level'])) {
                                echo 'not set';
                            } else {
                                echo $inventory['reorder_level'];
                            } ?></td>
                        <td><?php if (empty($inventory['reorder_qty'])) {
                                echo 'not set';
                            } else {
                                echo $inventory['reorder_qty'];
                            } ?></td>
                        <td><a href="<?php echo URL ?>inventory/edit/<?php echo $inventory['product_id'] ?>/<?php echo $inventory['size'] ?>/<?php echo trim($inventory['color'],"#") ?>">
                        <button class="table-btn btn-blue">Edit</button></a>


                    </tr>

                <?php endforeach; ?>




            </table>

        </div>
        <div class="pagination">
            <ol id="numbers"></ol>
        </div>
    </div>

</div>
<?php require 'views/footer_dashboard.php'; ?>
<script type="text/javascript" src="/wasthra/public/js/table_filter.js"></script>
<script type="text/javascript" src="/wasthra/public/js/sort_table.js"></script>
<script type="text/javascript" src="/wasthra/public/js/table_pagination.js"></script>
<script>
    $(pagination(10, 'inventory-table'));

    $('#per-page').on('change', function() {
        var rowsPerPage = parseInt($('#per-page').val());
        pagination(rowsPerPage, 'inventory-table');
    });
</script>