
/**
 * Sort the table by the given column and order
 *
 * @param  string tableId -- Id of the table
 * @param  int n -- Index of the column that need be based to sort the table
 * @param  string order -- Ascending or descending order
 * @return void
 */
function sortTable(tableId,n,order) {
  
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  
  table = document.getElementById(tableId);
  switching = true;

  dir = order;

  // make a loop that will continue until no switching has been done
  while (switching) {
    switching = false;
    rows = table.rows;
    // loop through all table rows except the table headers
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      // get the two elements you want to compare, one from current row and one from the next
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      // check if the two rows should switch place, based on the direction, asc or desc
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }

    if (shouldSwitch) {
      // If a switch has been marked, make the switch and mark that a switch has been done
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      // If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again
      if (switchcount == 0 && dir == "asc") {
        switching = true;
      }
    }
  }
}