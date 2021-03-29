<?php require 'views/header_dashboard.php'; ?>
<div class="small-container">

    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/filter_dropdown.css">
    <div class="row">
        <h2 class="title title-min">Delivery Charges</h2>
    </div>


    <div class="">
        <button class="btn btn-square" onclick="formToggle()">+ Add New Delivery Charge</button>
        <form action="<?php echo URL; ?>deliveryCharges/create" id="addFrom" class="hidden-form" method="post">
            <div class="row-top">
                <div class="col-3">
                    <div class="helper-text">
                        <label>City</label><br>
                        <input type="text" name="delivery_city" id="delivery_city" data-helper="City" onfocusout="validateDeliveryCity()">
                        <span class="popuptext"></span>
                    </div><br>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Delivery Fee</label><br>
                        <input type="text" name="delivery_fee" id="delivery_fee" data-helper="Delivery Fee" onfocusout="validateDeliveryFee()">
                        <span class="popuptext"></span>
                    </div><br>
                </div>
            </div>

            <div row>
                <div class="center-btn">
                    <button type="submit" class="btn">Add New Charge</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-search">
        <input type="text" id="keyword-input" onkeyup="filterByKeyword('dcharges-table',7)" placeholder="Search & filter entire table by keyword..">
    </div>



    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo $this->cityCount[0][0]; ?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach (range(10, 100, 10) as $i) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>


    <div class="table-container">
        <table id="dcharges-table">
            <thead>
                <tr>
                    <th>City<i onclick="showFilters('dcharges-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('dcharges-table',0,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('dcharges-table',0,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('dcharges-table',0,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('dcharges-table','checkbox-all-1')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-1">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('dcharges-table','checkbox-all-1')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Delivery Fee<i onclick="showFilters('dcharges-table',1,'dropdown-filter-2','checkbox-2','checkbox-all-2')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                        <div class="dropdown-filter-dropdown" id="dropdown-filter-2" style="display:none;">
                            <div class="dropdown-filter-content">
                                <div class="close-icon">
                                    <span style="float: left;">Filters:</span>
                                    <i class="fa fa-close" onclick="closeFilter('dropdown-filter-2')"></i>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('dcharges-table',1,'asc')">
                                    <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                                </div>
                                <div class="dropdown-filter-sort" onclick="sortTable('dcharges-table',1,'desc')">
                                    <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                                </div>
                                <div class="dropdown-filter-search table-search">
                                    <input type="text" id="dropdown-keyword-input-2" onkeyup="filterByDropdownKeyword('dcharges-table',1,'dropdown-keyword-input-2')" placeholder="Filter by keyword..">
                                </div>
                                <div class="checkbox-container">
                                    <input class="select-all" type="checkbox" id="checkbox-all-2" onchange="checkAll('dcharges-table','checkbox-all-2')" checked="true"><span>Select
                                        All</span>
                                    <div id="checkbox-2">
                                    </div>
                                    <i class="fas fa-eraser"></i><a onclick="clearFilters('dcharges-table','checkbox-all-2')">
                                        Clear Filters</a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Option</th>

                </tr>
            </thead>
            <tbody id="table-body">

                <?php foreach ($this->deliverycharges as $charges) : ?>

                    <tr>
                        <td><?php echo $charges['city']; ?></td>
                        <td><?php echo $charges['delivery_fee']; ?></td>

                        <td><a href="<?php echo URL ?>deliveryCharges/edit/<?php echo $charges['city'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                            <a href="<?php echo URL ?>deliveryCharges/delete/<?php echo $charges['city'] ?>"><button class="table-btn btn-red">Delete</button></a>
                        </td>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <ol id="numbers"></ol>

    </div>
</div>


<script type="text/javascript" src="/wasthra/public/js/table_pagination.js"></script>

<script>
    $(pagination(10, 'dcharges-table'));

    $('#per-page').on('change', function() {
        var rowsPerPage = parseInt($('#per-page').val());
        pagination(rowsPerPage, 'dcharges-table');
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
<script type="text/javascript" src="/wasthra/util/form/delivery_charges_form_validation.js"></script>

<?php require 'views/footer_dashboard.php'; ?>