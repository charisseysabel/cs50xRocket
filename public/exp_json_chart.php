<?php
    /**
     *  expenses_json.php
     *  json data of expenses from transactions table
     */

    // configuration
	require("../includes/config.php");
	
	// all subcategories
    $auto = $bankCharge = $cash = $charity = $childcare = $clothing = $creditCard = 0;
    $eatingOut = $education = $ent = $gifts = $groceries = $health = $home = $ins = 0;
    $interest = $loan = $med = $misc = $mortgage = $others = $pets = $rent = $tax = 0;
    $transport = $travel = $utilities = $household = 0;
	
	// search database
	$getExp = query("SELECT * FROM expense WHERE id = ? ", $_SESSION["id"]);
	if($getExp === false)
	{
	    apologize("Error fetching expenses transactions");
	}
	
	// loop through all expenses transactions
	for($i = 0; $i < count($getExp); $i++)
	{
	    // change amount to an int
	    //$getInt = $getExp[$i]["exp_amount"];
	    $newInt = $getExp[$i]["exp_amount"];
	    
	    // sort by type
	    // auto
	    if($getExp[$i]["exp_category"] === "Auto")
	    {
	        $auto += $newInt;
	    }
	    // bank charge
	    else if($getExp[$i]["exp_category"] === "Bank charge")
	    {
	        $bankCharge += $newInt;
	    }
	    // cash
	    else if($getExp[$i]["exp_category"] === "Cash")
	    {
	        $cash += $newInt;
	    }
	    // charity
	    else if($getExp[$i]["exp_category"] === "Charity")
	    {
	        $charity += $newInt;
	    }
	    // childcare
	    else if($getExp[$i]["exp_category"] === "Childcare")
	    {
	        $childcare += $newInt;
	    }
	    // credit card
	    else if($getExp[$i]["exp_category"] === "Credit card payment")
	    {
	        $creditCard += $newInt;
	    }
	    // clothing
	    else if($getExp[$i]["exp_category"] === "Clothing")
	    {
	        $clothing += $newInt;
	    }
	    // eating out
	    else if($getExp[$i]["exp_category"] === "Eating out")
	    {
	        $eatingOut += $newInt;
	    }
	    // education
	    else if($getExp[$i]["exp_category"] === "Education")
	    {
	        $education += $newInt;
	    }
	    // entertainment
	    else if($getExp[$i]["exp_category"] === "Entertainment")
	    {
	        $ent += $newInt;
	    }
	    // gifts
	    else if($getExp[$i]["exp_category"] === "Gifts")
	    {
	        $gifts += $newInt;
	    }
	    // groceries
	    else if($getExp[$i]["exp_category"] === "Groceries")
	    {
	        $groceries += $newInt;
	    }
	    // health
	    else if($getExp[$i]["exp_category"] === "Health & fitness")
	    {
	        $health += $newInt;
	    }
	    // home repair
	    else if($getExp[$i]["exp_category"] === "Home repair")
	    {
	        $home += $newInt;
	    }
	    // household
	    else if($getExp[$i]["exp_category"] === "Household")
	    {
	        $household += $newInt;
	    }
	    // insurance
	    else if($getExp[$i]["exp_category"] === "Insurance")
	    {
	        $ins += $newInt;
	    }
	    // interest
	    else if($getExp[$i]["exp_category"] === "Interest")
	    {
	        $interest += $newInt;
	    }
	    // loan
	    else if($getExp[$i]["exp_category"] === "Loan")
	    {
	        $loan += $newInt;
	    }
	    // medical
	    else if($getExp[$i]["exp_category"] === "Medical")
	    {
	        $med += $newInt;
	    }
	    // misc
	    else if($getExp[$i]["exp_category"] === "Misc")
	    {
	        $misc += $newInt;
	    }
	    // mortgage
	    else if($getExp[$i]["exp_category"] === "Mortgage")
	    {
	        $mortgage += $newInt;
	    }
	    // others
	    else if($getExp[$i]["exp_category"] === "Others")
	    {
	        $others += $newInt;
	    }
	    // pets
	    else if($getExp[$i]["exp_category"] === "Pets")
	    {
	        $pets += $newInt;
	    }
	    // rent
	    else if($getExp[$i]["exp_category"] === "Rent")
	    {
	        $rent += $newInt;
	    }
	    // tax
	    else if($getExp[$i]["exp_category"] === "Tax")
	    {
	        $tax += $newInt;
	    }
	    // transport
	    else if($getExp[$i]["exp_category"] === "Transport")
	    {
	        $transport += $newInt;
	    }
	    // travel
	    else if($getExp[$i]["exp_category"] === "Travel")
	    {
	        $travel += $newInt;
	    }
	    // utilities
	    else if($getExp[$i]["exp_category"] === "Utilities")
	    {
	        $utilities += $newInt;
	    }
	    // if empty
	    else if($getExp[$i]["exp_category"] === "")
	    {
	        $misc += $newInt;
	    }
	    
	}
	
	$allExpense = array(
	    array("exp_amount" => $auto, "exp_category" => "Auto"),
	    array("exp_amount" => $bankCharge, "exp_category" => "Bank charge"),
	    array("exp_amount" => $cash, "exp_category" => "Cash"),
	    array("exp_amount" => $charity, "exp_category" => "Charity"),
	    array("exp_amount" => $childcare, "exp_category" => "Childcare"),
	    array("exp_amount" => $childcare, "exp_category" => "Clothing"),
	    array("exp_amount" => $creditCard, "exp_category" => "Credit card payment"),
	    array("exp_amount" => $eatingOut, "exp_category" => "Eating out"),
	    array("exp_amount" => $education, "exp_category" => "Education"),
	    array("exp_amount" => $ent, "exp_category" => "Entertainment"),
	    array("exp_amount" => $gifts, "exp_category" => "Gifts"),
	    array("exp_amount" => $groceries, "exp_category" => "Groceries"),
	    array("exp_amount" => $health, "exp_category" => "Health & fitness"),
	    array("exp_amount" => $home, "exp_category" => "Home repair"),
	    array("exp_amount" => $household, "exp_category" => "Household"),
	    array("exp_amount" => $ins, "exp_category" => "Insurance"),
	    array("exp_amount" => $interest, "exp_category" => "Interest"),
	    array("exp_amount" => $loan, "exp_category" => "Loan"),
	    array("exp_amount" => $med, "exp_category" => "Medical"),
	    array("exp_amount" => $misc, "exp_category" => "Misc"),
	    array("exp_amount" => $mortgage, "exp_category" => "Mortgage"),
	    array("exp_amount" => $others, "exp_category" => "Others"),
	    array("exp_amount" => $pets, "exp_category" => "Pets"),
	    array("exp_amount" => $rent, "exp_category" => "Rent"),
	    array("exp_amount" => $tax, "exp_category" => "Tax"),
	    array("exp_amount" => $transport, "exp_category" => "Transport"),
	    array("exp_amount" => $travel, "exp_category" => "Travel"),
	    array("exp_amount" => $utilities, "exp_category" => "Utilities"),
	);
	
	header("Content-type: application/json");
	print(json_encode($allExpense, JSON_PRETTY_PRINT));
	
	/*
	if($getExp !== false)
	{
	    $exp_json = $getExp;
	
	    // output as JSON
	    header("Content-type: application/json");
	    print(json_encode($exp_json, JSON_PRETTY_PRINT));
	}
	*/
?>









