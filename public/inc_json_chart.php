<?php
    /**
     *  inc_json_chart.php
     *  json data of income from transactions table
     */

    // configuration
	require("../includes/config.php");
	
	$business = $bonus = $others = $salary = $savings = $tax = 0;
	
	// search database
	$getInc = query("SELECT * FROM trans_income WHERE `id` = ? ", $_SESSION["id"]);
	if($getInc === false)
	{
	    apologize("Error fetching income transactions");
	}
	
	// loop through the income transactions
	for($i = 0; $i < count($getInc); $i++)
	{
	    //$getTot = $getInc[$i]["income_amount"];
	    $newInt = $getInc[$i]["income_amount"];
	    
	    // business
	    if($getInc[$i]["income_category"] === "Business")
	    {
	        $business += $newInt;
	    }
	    // bonus
	    else if($getInc[$i]["income_category"] === "Bonus")
	    {
	        $bonus += $newInt;
	    }
	    // others
	    else if($getInc[$i]["income_category"] === "Others")
	    {
	        $others += $newInt;
	    }
	    // salary
	    else if($getInc[$i]["income_category"] === "Salary")
	    {
	        $salary += $newInt;
	    }
	    // savings
	    else if($getInc[$i]["income_category"] === "Savings deposit")
	    {
	        $savings += $newInt;
	    }
	    // tax
	    else if($getInc[$i]["income_category"] === "Tax refund")
	    {
	        $tax += $newInt;
	    }
	    // if sub category is blank, dump it to 'others'
	    else if($getInc[$i]["income_category"] === "")
	    {
	        $others += $newInt;
	    }
	        
	}
	
	
	$allIncome = array(
	    array("income_amount" => $business, "income_category" => "Business"), 
	    array("income_amount" => $bonus, "income_category" => "Bonus"),
	    array("income_amount" => $others, "income_category" => "Others"),
	    array("income_amount" => $salary, "income_category" => "Salary"),
	    array("income_amount" => $savings, "income_category" => "Savings deposit"),
	    array("income_amount" => $tax, "income_category" => "Tax refund")
	);
	
	// output as json
	header("Content-type: application/json");
	print(json_encode($allIncome, JSON_PRETTY_PRINT));
	
	/*
	if($getInc !== false)
	{
	    $inc_json = $getInc;
	
	    // output as JSON
	    header("Content-type: application/json");
	    print(json_encode($inc_json, JSON_PRETTY_PRINT));
	}
	*/
?>
