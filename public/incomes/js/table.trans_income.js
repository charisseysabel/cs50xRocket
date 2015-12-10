
/*
 * Editor client script for DB table trans_income
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.trans_income.php',
		table: '#trans_income',
		fields: [
			{
				"label": "Transaction",
				"name": "income_trans"
			},
			{
				"label": "Category",
				"name": "income_category",
				"type": "select",
				"options": [
					"Business",
					"Bonus",
					"Others",
					"Salary",
					"Savings deposit",
					"Tax refund"
				]
			},
			{
				"label": "Amount",
				"name": "income_amount"
			},
			{
				"label": "Date",
				"name": "income_date",
				"type": "date",
				"def" : function() { return new Date(); },
				"dateformat" : "m/d/YY"
			}
		]
	} );

	var table = $('#trans_income').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.trans_income.php',
		columns: [
			{
				"data": "income_trans"
			},
			{
				"data": "income_category"
			},
			{
				"data": "income_amount"
			},
			{
				"data": "income_date"
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

