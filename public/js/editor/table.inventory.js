
/*
 * Editor client script for DB table inventory
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.inventory.php',
		table: '#inventory',
		fields: [
			{
				"label": "product",
				"name": "product"
			},
			{
				"label": "supplier",
				"name": "supplier_name"
			}
		]
	} );

	var table = $('#inventory').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.inventory.php',
		columns: [
			{
				"data": "product"
			},
			{
				"data": "supplier_name"
			}
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

