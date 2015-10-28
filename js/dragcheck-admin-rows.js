/*
 * Dragcheck Admin Rows JS for Dragcheck Admin Rows WordPress Plugin
 * Author: X-Raym
 * Author URl: http://extremraym.com/
 * Date: 2015-10-28
 * Version: 1.0
 */

// Trick from http://www.paulund.co.uk/jquery-in-wordpress-admin-area */
$j=jQuery.noConflict();

// SELECT ALL CHECKBOX
// http://www.sanwebe.com/2014/01/how-to-select-all-deselect-checkboxes-jquery
$j(document).ready(function(){
	$j(window).load(function(){
		$j('table tbody').dragcheck({
		container: 'tr', // Using the tr as a container
		onSelect: function(obj, state) {
				obj.prop('checked', state);
				if (obj.attr("checked") ) {
						obj.parent().parent().addClass( "row-checked" );
				} else {
					obj.parent().parent().removeClass( "row-checked" );
				}
			}
		});
	});
});


$j(document).ready(function () {

	$j("tbody .check-column input").change(function () {
				if ($j(this).attr("checked") ) {
						$j(this).parent().parent().addClass( "row-checked" );
				} else {
						$j(this).parent().parent().removeClass( "row-checked" );
				}
		});

	$j("thead .check-column input").change(function () {
				if ($j(this).attr("checked") ) {
						$j("tbody .check-column input").parent().parent().addClass( "row-checked" );
				} else {
						$j("tbody .check-column input").parent().parent().removeClass( "row-checked" );
				}
		});

});
