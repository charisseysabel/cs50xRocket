<?php

    /**
     *  search_inv_ajax.php
     *  search results from the inventory search tab
     */
     
     // configuration
	require("../includes/config.php");
	require("../includes/render_dash.php");
     
    // if user reached page via GET...
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    if(isset($_POST["submit"]) )
	    {
	        if(isset($_GET["go"]) )
	        {
	            if(preg_match("/[A-Z  | a-z]+/", $_POST["name"]))
	            {
	                $name = $_POST["name"];
	                
	                $allResult = [];
	                $search_result = query("SELECT * FROM inventory WHERE
                    MATCH(product, category, supplier_name)
                    AGAINST(? IN BOOLEAN MODE)", $name );
                    if($search_result === false)
                    {
                        apologize("Unable to retrieve data.");
                    }
                    else
                    {
                        foreach($search_result as $result)
                        {
                            $allResult = [
                                "product" => $info["product"],
	                            "unit_price" => number_format($info["unit_price"], 2),
	                            "retail_price" => number_format($info["retail_price"], 2),
	                            "supplier_name" => $info["supplier_name"],
	                            "category" => $info["category"],
                            ];    
                        }
                    }
	            }
	            else
	            {
	                apologize("Please enter only lowercase or uppercase letters.");
	            }
	        }
	    }
	    else
	    {
	        apologize("Please enter a search query.");
	    }
	} 
?>

                <div id="inv_tbl">
                
                    <table class="table table-striped" id="tblSearch">
	                    <thead>
		                    <tr>
			                    <th>Product Name</th>
			                    <th>Supplier Name</th>
			                    <th>Category</th>
			                    <th>Unit Price</th>
			                    <th>Retail Price</th>
			                    <th>Est. profit per unit</th>			
			                    
		                    </tr>
	                    </thead>
	
	                    <tbody>
	                        <?php foreach($search_result as $info): ?>
	                            <tr>
	                                <td> <?= $info['product'] ?> </td>
	                                <td> <?= $info["supplier_name"] ?> </td>
	                                <td> <?= $info["category"] ?> </td>
	                                <td>$ <?= $info["unit_price"] ?> </td>
	                                <td>$ <?= $info["retail_price"] ?> </td>
	                                <td>$ <?= number_format(($info["unit_price"] - $info["retail_price"]), 2 ) ?></td>
	                                <td> <span class="td_link"><a href="edit_inv.php?product=<?= $info['product']?>">Edit</a></span> </td>
                                    <td> <span class="td_link"><a href="del_inv.php?product=<?= $info['product']?>">Delete</a></span></td>

	                                
	                            </tr>
	                        <?php endforeach ?>


	                    </tbody>
                    </table>
              </div>
