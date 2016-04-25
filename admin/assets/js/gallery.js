$(function() {
	$( "#sortable, #sortable2" ).sortable({
		helper:"clone", 
		opacity:0.5,
		cursor:"crosshair",
		connectWith: ".list",

	});
	$( "#sortable, #sortable2" ).disableSelection();

	var highestCol = Math.max($('#origin').height(),$('#drop').height());
	$('.fbox').height(highestCol);
	
	// Cache selectors outside callback for performance. 
	var $window = $(window),
	$stickyEl = $('#scrolling-div'),
	elTop = $stickyEl.offset().top;

	$window.scroll(function() {
		$stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
	});
});

function saveOrder() {
	var origin = document.getElementById('saveButton').getAttribute('origin');
	var r = confirm("Are you sure you want to save?");
	if (r == true) {
    	var newOrder = $('#sortable').sortable('toArray').toString();
    	$.get('rename.php', {order:newOrder, origin: origin});
	} else {}
}

function deleteImages() {
	var origin = document.getElementById('deleteButton').getAttribute('origin');
	var r = confirm("Are you sure you want to delete images?");
	if (r == true) {
    	var rmFiles = $('#sortable2').sortable('toArray').toString();
    	$.get('delete.php', {delete:rmFiles, origin: origin});
    	$('#sortable2').empty();
	} else {}
}

function clearUploadForm()
{
	$('#fileinput').filestyle('clear');
}