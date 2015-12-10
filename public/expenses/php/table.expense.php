<?php

/*
 * Editor server script for DB table expense
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
Editor::inst( $db, 'expense', 'exp_no' )
	->fields(
		Field::inst( 'id' )
			->set( false ),
		Field::inst( 'exp_trans' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::maxLen', array( 'max'=>30 ) ),
		Field::inst( 'exp_category' ),
		Field::inst( 'exp_amount' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'exp_date' )
	)
	->process( $_POST )
	->json();
