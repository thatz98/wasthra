function filterByKeyword(tableId,columnCount) {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("keyword-input");
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    for (i = 0; i < tr.length; i++) {
        for (j = 0; j < columnCount; j++) {
            td = tr[i].getElementsByTagName("TD")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
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

function filterByDropdownKeyword(tableId,columnId,inputId) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("TD")[columnId];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function closeFilter(dropdownId){
    var dropdown = document.getElementById(dropdownId);
    dropdown.style.display = "none";
}

function checkAll(tableId,checkboxAllId) {
    var table, tr, i;
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var checkboxes = document.getElementsByName('checkbox-data');
    var selectAll = document.getElementById(checkboxAllId);

    if(selectAll.checked){
        for (var checkbox of checkboxes) {
            checkbox.checked = true;
        }
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "";
        } 
    } else{
        for (var checkbox of checkboxes) {
            checkbox.checked = false;
        }
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
        }       
    }
}

function showFilters(tableId,columnId,dropdownId,checkboxId,selectAllId) {
    var dropdown = document.getElementById(dropdownId);
        
    if(dropdown.style.display == "none"){
        dropdown.style.display = "";
    } else{
        dropdown.style.display = "none";
    }

    document.getElementById(checkboxId).innerHTML = "";
    var table, tr, td, i;
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var distinct = [];

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("TD")[columnId];

        if(distinct.includes(td.innerHTML)){
            continue;
        } else{
            distinct.push(td.innerHTML);
            document.getElementById(checkboxId).innerHTML = document.getElementById(checkboxId).innerHTML + '<input type="checkbox" name="checkbox-data" value="' + td.innerHTML + '" onchange="filterByCheck(\'' + tableId + '\',\'' + td.innerHTML + '\',\'' + columnId + '\',\'' + selectAllId + '\')" checked><span>' + td.innerHTML + '</span><br>';
        }       
    }
}

function getSelectedCheckboxes() {
    var checkboxes = document.getElementsByName('checkbox-data');
    var checkboxValues = [];
    for (var checkbox of checkboxes) {
        if (checkbox.checked){
            checkboxValues.push(checkbox.value.toUpperCase());
        }
    }

    return checkboxValues;
}

function clearFilters(tableId,selectAllId){
    var table, tr, i;
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    var checkboxes = document.getElementsByName('checkbox-data');
    var selectAll = document.getElementById(selectAllId);
    selectAll.checked = true;
    for (var checkbox of checkboxes) {
        checkbox.checked = true;
    }
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "";
    } 
}

function checkMatches(txtValue,filter){
    for(var filterVal of filter){
        if(txtValue.toUpperCase().indexOf(filterVal) > -1){
            return true;
        }
    }

    return false;
}

function checkAllSelected(){
    var checkboxes = document.getElementsByName('checkbox-data');
    for (var checkbox of checkboxes) {
        if (!checkbox.checked){
            return false;
        }
    }

    return true;
}
    
function filterByCheck(tableId,data,columnId,checkboxId) {
    if(!checkAllSelected()){
        var selectAll = document.getElementById(checkboxId);
        selectAll.checked = false;
    }
    var input, table, tr, td, th, i, txtValue;
    var filter = getSelectedCheckboxes();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("TR");
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("TD")[columnId];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (checkMatches(txtValue,filter)) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }          
        }
    }
}

