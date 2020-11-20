function pagination(rowsPerPage,tableId) {
	var rowsPerPage = rowsPerPage;
	const rows = $('#'+tableId+' tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals
	const numbers = $('#numbers');
	numbers.empty();
	// Generate the pagination.
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li><a href="#">' + (i+1) + '</a></li>');
	}
		
	// Mark the first page link as active.
	$('#numbers li:first-child a').addClass('active');

	// Display the first set of rows.
	displayRows(1,rowsCount);
	
	// On pagination click.
	$('#numbers li a').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		// Remove the active class from the links.
		$('#numbers li a').removeClass('active');
		
		// Add the active class to the current link.
		$this.addClass('active');
		
		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text(),rowsCount);
	});
	
	// Function that displays rows for a specific page.
	function displayRows(index,total) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
        $('#start').text(start+1);
if (total<=end) {
    $('#end').text(total);
} else{
    $('#end').text(end);
}
		
		// Hide all rows.
		rows.hide();
		
		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
}