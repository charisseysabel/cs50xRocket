
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
				"label": "Product",
				"name": "product"
			},
			{
				"label": "Supplier",
				"name": "supplier_name"
			},
			{
				"label": "Category",
				"name": "category"
			},
			{
				"label": "Unit Price",
				"name": "unit_price"
			},
			{
				"label": "Retail Price",
				"name": "retail_price"
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
			},
			{
				"data": "category"
			},
			{
				"data": "unit_price"
			},
			{
				"data": "retail_price"
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

