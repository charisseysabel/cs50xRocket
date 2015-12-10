
/*
 * Editor client script for DB table expense
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.expense.php',
		table: '#expense',
		fields: [
			{
				"label": "Transaction",
				"name": "exp_trans"
			},
			{
				"label": "Category",
				"name": "exp_category",
				"type": "select",
				"options": [
					"Auto",
					"Bank charge",
					"Cash",
					"Charity",
					"Childcare",
					"Clothing",
					"Credit card payment",
					"Eating out",
					"Education",
					"Entertainment",
					"Gifts",
					"Groceries",
					"Health & fitness",
					"Home repair",
					"Household",
					"Insurance",
					"Interest",
					"Loan",
					"Medical",
					"Misc",
					"Mortgage",
					"Others",
					"Pets",
					"Rent",
					"Tax",
					"Transport",
					"Travel",
					"Utilities"
				]
			},
			{
				"label": "Amount",
				"name": "exp_amount"
			},
			{
				"label": "Date",
				"name": "exp_date",
				"type": "date",
				"def" : function() { return new Date(); },
				"dateformat" : "m/d/YY"
			}
		]
	} );

	var table = $('#expense').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.expense.php',
		columns: [
			{
				"data": "exp_trans"
			},
			{
				"data": "exp_category"
			},
			{
				"data": "exp_amount"
			},
			{
				"data": "exp_date"
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

