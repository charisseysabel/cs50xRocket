<?php

/*
 * Editor server script for DB table trans_income
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'trans_income', 'income_no' )
	->fields(
		Field::inst( 'id' )
			->set( false ),
		Field::inst( 'income_trans' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::maxLen', array( 'max'=>30 ) ),
		Field::inst( 'income_category' ),
		Field::inst( 'income_amount' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'income_date' )
	)
	->process( $_POST )
	->json();
