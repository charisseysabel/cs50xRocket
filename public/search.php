<?php
    /**
     *  search.php
     *
     */
    
    require("../includes/config.php");

    // numerically indexed array of places
    $products = [];

    $geoVar = urldecode($_GET["?"]);

    // search database for places matching $_GET["geo"]
    $search = query("SELECT * FROM inventory WHERE
        MATCH(product)
        AGAINST(? IN BOOLEAN MODE)", $_GET["?"] );
    
    
    $products = $search;

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($products, JSON_PRETTY_PRINT));

?>
