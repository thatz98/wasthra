/**
 * Check all the checkboxes in the filter dropdown
 *
 * @param  int rowsPerPage -- Number of rows per page
 * @param  string tableId -- Id of the table 
 * @return void
 */
function pagination(rowsPerPage, tableId) {
	var rowsPerPage = rowsPerPage;
	const rows = $('#' + tableId + ' tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage);
	const numbers = $('#numbers');
	numbers.empty();

	// generate the pagination
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li><a href="#">' + (i + 1) + '</a></li>');
	}

	// set the first page link active
	$('#numbers li:first-child a').addClass('active');
	// display the first row set
	displayRows(1, rowsCount);

	$('#numbers li a').click(function (e) {
		var $this = $(this);
		e.preventDefault();
		$('#numbers li a').removeClass('active');
		$this.addClass('active');
		// display the rows corresponding to the clicked page number
		displayRows($this.text(), rowsCount);
	});

	/**
	 * Displays rows for a specific page
	 *
	 * @param  int index -- Idex of the page
	 * @param  int total -- Total number of rows 
	 * @return void
	 */
	function displayRows(index, total) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
		$('#start').text(start + 1);
		if (total <= end) {
			$('#end').text(total);
		} else {
			$('#end').text(end);
		}

		// hide all rows
		rows.hide();

		// show only the rows for the corresponding page
		rows.slice(start, end).show();
	}
}