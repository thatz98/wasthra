
/**
 * Filter the table by the given keyword
 *
 * @param  string tableId -- Id of the table
 * @param  string columnCount -- Number of columns in the table
 * @return void
 */
function filterByKeyword(tableId, columnCount) {

    var input, filter, table, tr, td, i, j, txtValue;

    input = document.getElementById("keyword-input");
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");

    // traverse each table row
    for (i = 0; i < tr.length; i++) {
        //traverse each column of the row
        for (j = 0; j < columnCount; j++) {
            td = tr[i].getElementsByTagName("TD")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                // if the text doesn't includes the given keyword that row will be hidden
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}


/**
 * Filter the table by the keyword given in the filter dropdown
 *
 * @param  string tableId -- Id of the table
 * @param  string columnId -- Id of the column
 * @param  string inputId -- Id of the input where the keyword is typed
 * @return void
 */
function filterByDropdownKeyword(tableId, columnId, inputId) {

    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");

    // traverse each row of the table
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("TD")[columnId];
        if (td) {
            txtValue = td.textContent || td.innerText;
            // if the text doesn't includes the given keyword that row will be hidden
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

/**
 * Close the filter dropdown
 *
 * @param  string dropdownId -- Id of the dropdown popup
 * @return void
 */
function closeFilter(dropdownId) {

    var dropdown = document.getElementById(dropdownId);
    dropdown.style.display = "none";
}

/**
 * Check all the checkboxes in the filter dropdown
 *
 * @param  string tableId -- Id of the table
 * @param  string checkboxAllId -- Id of the Select All checbox 
 * @return void
 */
function checkAll(tableId, checkboxAllId) {

    var table, tr, i;

    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var checkboxes = document.getElementsByName('checkbox-data');
    var selectAll = document.getElementById(checkboxAllId);

    if (selectAll.checked) {
        for (var checkbox of checkboxes) {
            checkbox.checked = true;
        }
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    } else {
        for (var checkbox of checkboxes) {
            checkbox.checked = false;
        }
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
        }
    }
}

/**
 * Show filter checkboxes in the dropdown
 *
 * @param  string tableId -- Id of the table
 * @param  string columnId -- Id of the column
 * @param  string dropdownId -- Id of the dropdown popup
 * @param  string checkboxId -- Id of the checkbox
 * @param  string selectAllId -- Id of the Select All checbox
 * @return void
 */
function showFilters(tableId, columnId, dropdownId, checkboxId, selectAllId) {

    var table, tr, td, tdArray, i;

    var dropdown = document.getElementById(dropdownId);

    if (dropdown.style.display == "none") {
        dropdown.style.display = "";
    } else {
        dropdown.style.display = "none";
    }

    document.getElementById(checkboxId).innerHTML = "";

    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var distinct = [];

    // traverse all the table rows in that column, get all the distinct values and create checkbox list
    for (i = 1; i < tr.length; i++) {
        tdArray = tr[i].getElementsByTagName("TD");
        if (tdArray.length == 0) {
            continue;
        }
        td = tdArray[columnId];
        if (distinct.includes(td.innerHTML)) {
            continue;
        } else {
            distinct.push(td.innerHTML);
            if (tr[i].style.display == "none") {
                document.getElementById(checkboxId).innerHTML = document.getElementById(checkboxId).innerHTML + '<input type="checkbox" name="checkbox-data" value="' + td.innerHTML + '" onchange="filterByCheck(\'' + tableId + '\',\'' + td.innerHTML + '\',\'' + columnId + '\',\'' + selectAllId + '\')"><span>' + td.innerHTML + '</span><br>';
            } else {
                document.getElementById(checkboxId).innerHTML = document.getElementById(checkboxId).innerHTML + '<input type="checkbox" name="checkbox-data" value="' + td.innerHTML + '" onchange="filterByCheck(\'' + tableId + '\',\'' + td.innerHTML + '\',\'' + columnId + '\',\'' + selectAllId + '\')" checked><span>' + td.innerHTML + '</span><br>';
            }

        }
    }

    if (!checkAllSelected()) {
        var selectAll = document.getElementById(checkboxId);
        selectAll.checked = false;
    }
}

/**
 * Get the checked checkboxes
 *
 * @return mixed checkboxValues -- List of selected checkboxes
 */
function getSelectedCheckboxes() {

    var checkboxes = document.getElementsByName('checkbox-data');
    var checkboxValues = [];

    for (var checkbox of checkboxes) {
        if (checkbox.checked) {
            checkboxValues.push(checkbox.value.toUpperCase());
        }
    }

    return checkboxValues;
}

/**
 * Clear all filters
 *
 * @param  string tableId -- Id of the table
 * @param  string selectAllId -- Id of the Select All checkbox
 * @return void
 */
function clearFilters(tableId, selectAllId) {

    var table, tr, i;

    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var checkboxes = document.getElementsByName('checkbox-data');
    var selectAll = document.getElementById(selectAllId);
    selectAll.checked = true;

    // check all the checkboxes
    for (var checkbox of checkboxes) {
        checkbox.checked = true;
    }

    // display all hidden rows
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "";
    }
}

/**
 * Match the given two strings 
 *
 * @param  string txtValue -- Text of the cell
 * @param  string filter -- Keyword of the filter
 * @return bool
 */
function checkMatches(txtValue, filter) {

    for (var filterVal of filter) {
        if (txtValue.toUpperCase().indexOf(filterVal) > -1) {
            return true;
        }
    }

    return false;
}

/**
 * Chech wether all the filter checkboxes are selected
 *
 * @return bool
 */
function checkAllSelected() {

    var checkboxes = document.getElementsByName('checkbox-data');

    for (var checkbox of checkboxes) {
        if (!checkbox.checked) {
            return false;
        }
    }

    return true;
}

/**
 * Filter the table by the checkboxes in the filter dropdown
 *
 * @param  string tableId -- Id of the table
 * @param  string data -- value of checkbox
 * @param  string columnId -- Id of the column
 * @param  string checkboxId -- Id of the clicked checkbox
 * @return void
 */
function filterByCheck(tableId, data, columnId, checkboxId) {

    var table, tr, td, i, txtValue;

    // check whether all the checkboxes are selected to check or uncheck Select All checkbox
    if (!checkAllSelected()) {
        var selectAll = document.getElementById(checkboxId);
        selectAll.checked = false;
    } else {
        var selectAll = document.getElementById(checkboxId);
        selectAll.checked = true;
    }

    var filter = getSelectedCheckboxes();

    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");

    // traverse all the rows of the table
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("TD")[columnId];
        if (td) {
            txtValue = td.textContent || td.innerText;
            // if the filter doesn't match with the cell value it will be hidden
            if (checkMatches(txtValue, filter)) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

