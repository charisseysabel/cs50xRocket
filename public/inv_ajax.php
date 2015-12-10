<?php
    /**
     *  json.php
     *  sample test to generate json data from balance databases
     */
    // configuration
    require("../includes/config.php");
    
    $users = [];
    
    // search database
    $search = query("SELECT item_no, product, supplier_name, category, unit_price, retail_price FROM `inventory` WHERE `id` = ?", $_SESSION["id"]);
    if($search !== false)
    {
        $users = $search;
    
        // output as JSON
        header("Content-type: application/json");
        print(json_encode($users, JSON_PRETTY_PRINT));
    }
?>
