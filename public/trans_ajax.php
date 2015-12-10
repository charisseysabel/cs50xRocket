<?php
    /**
     *  inv_ajax.php
     *  returns json of inventory database data
     */

    require(__DIR__ . "/../includes/config.php");
    
    // numerically indexed array of places
    $trans_json = [];

    $fetch_trans = query("SELECT trans_name, trans_category, trans_sub_cat, trans_amount, trans_time FROM transactions WHERE id = ?", $_SESSION["id"] );
    if($fetch_trans === false)
    {
        apologize("Failed to fetch transactions data");    
    }
    
    $trans_json = $fetch_trans;

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print( json_encode($trans_json, JSON_PRETTY_PRINT) );
?>
