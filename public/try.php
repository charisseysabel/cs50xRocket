<?php

/*
 * Editor server script for DB table inventory
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "editor/php/lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'inventory', 'item_no' )
    ->fields(
        Field::inst( 'supplier_name' ),
        Field::inst( 'category' )
            ->validator( 'Validate::maxLen', array( 'max'=>30 ) ),
        Field::inst( 'unit_price' )
            ->validator( 'Validate::maxLen', array( 'max'=> ) ),
        Field::inst( 'retail_price' )
            ->validator( 'Validate::numeric' ),
        Field::inst( 'product' )
            ->validator( 'Validate::notEmpty' )
            ->validator( 'Validate::unique' )
    )
    ->process( $_POST )
    ->json();