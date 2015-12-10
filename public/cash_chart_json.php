<?php
    /**
     *  monthly_dtl_json.php
     *  monthly json data for cashflow tab
     */

    // configuration
	require("../includes/config.php");
	
	// all expenses variable
	$jan_Exp = $feb_Exp = $mar_Exp = $apr_Exp = $may_Exp = $jun_Exp = 0;
    $jul_Exp = $aug_Exp = $sep_Exp = $oct_Exp = $nov_Exp = $dec_Exp = 0;
	
	// all income variable
	$jan_Inc = $feb_Inc = $mar_Inc = $apr_Inc = $may_Inc = $jun_Inc = 0;
    $jul_Inc = $aug_Inc = $sep_Inc = $oct_Inc = $nov_Inc = $dec_Inc = 0;
    
    // month arrays
    $jan = $feb = $mar = $apr = $may = $jun = [];
    $jul = $aug = $sep = $oct = $nov = $dec = [];

	    
	    // get total expenses
	    $getExpense = query("SELECT * FROM expense WHERE id = ?", $_SESSION["id"]);
	    if($getExpense === false)
	    {
	        apologize("Error fetching expenses data.");
	    }
	    
	    // get total income
	    $getIncome = query("SELECT * FROM trans_income WHERE id = ?", $_SESSION["id"]);
	    if($getIncome === false)
	    {
	        apologize("Error fetching income data");
	    }

        /**	    
	     * monthly details table
	     */
	    // loop through getExpense again
	    for($k = 0; $k < count($getExpense); $k++)
	    {
	        // access date and convert it to whatever format I want
	        $date = strtotime($getExpense[$k]["exp_date"]);
	        $newDate = date('M Y', $date);
	        
	        // access amount and convert it to an int
	        $getAmt = $getExpense[$k]["exp_amount"];
	        $newInt = (int) $getAmt;
	        
	        	// filter by month...
	            // Jan
	            if($newDate === "Jan 2015")
	            {
	                $jan_Exp += $newInt;
	            }
	            // feb
	            else if($newDate === "Feb 2015")
	            {
	                $feb_Exp += $newInt;
	            }
	            // mar
	            else if($newDate === "Mar 2015")
	            {
	                $mar_Exp += $newInt;
	            }
	            // april
	            else if($newDate === "Apr 2015")
	            {
	                $apr_Exp += $newInt;
	            }
	            // may
	            else if($newDate === "May 2015")
	            {
	                $may_Exp += $newInt;
	            }
	            // june
	            else if($newDate === "Jun 2015")
	            {
	                $jun_Exp += $newInt;
	            }
	            // july
	            else if($newDate === "Jul 2015")
	            {
	                $jul_Exp += $newInt;
	            }
	            // aug
	            else if($newDate === "Aug 2015")
	            {
	                $aug_Exp += $newInt;
	            }
	            // sept
	            else if($newDate === "Sep 2015")
	            {
	                $sep_Exp += $newInt;
	            }
	            //oct
	            else if($newDate === "Oct 2015")
	            {
	                $oct_Exp += $newInt;
	            }
	            //nov
	            else if($newDate === "Nov 2015")
	            {
	                $nov_Exp += $newInt;
	            }
	            // dec
	            else if($newDate === "Dec 2015")
	            {
	                $dec_Exp += $newInt;
	            } 	        
	    }
	    
	   // loop through getIncome again
	   for($a = 0; $a < count($getIncome); $a++)
	   {
	        // access date and convert it to whatever format I want	   
	        $dateIncome = strtotime($getIncome[$a]["income_date"]);
	        $newIncome = date('M Y', $dateIncome);
	        
	        // access amount and convert it to an int
	        $incAmount = $getIncome[$a]["income_amount"];
	        $newIncAmt = (int) $incAmount;
	        
	            // filter by month...
	            // Jan
	            if($newIncome === "Jan 2015")
	            {
	                $jan_Inc += $newIncAmt;
	            }
	            // feb
	            else if($newIncome === "Feb 2015")
	            {
	                $feb_Inc += $newIncAmt;
	            }
	            // mar
	            else if($newIncome === "Mar 2015")
	            {
	                $mar_Inc += $newIncAmt;
	            }
	            // april
	            else if($newIncome === "Apr 2015")
	            {
	                $apr_Inc += $newIncAmt;
	            }
	            // may
	            else if($newIncome === "May 2015")
	            {
	                $may_Inc += $newIncAmt;
	            }
	            // june
	            else if($newIncome === "Jun 2015")
	            {
	                $jun_Inc += $newIncAmt;
	            }
	            // july
	            else if($newIncome === "Jul 2015")
	            {
	                $jul_Inc += $newIncAmt;
	            }
	            // aug
	            else if($newIncome === "Aug 2015")
	            {
	                $aug_Inc += $newIncAmt;
	            }
	            // sept
	            else if($newIncome === "Sep 2015")
	            {
	                $sep_Inc += $newIncAmt;
	            }
	            //oct
	            else if($newIncome === "Oct 2015")
	            {
	                $oct_Inc += $newIncAmt;
	            }
	            //nov
	            else if($newIncome === "Nov 2015")
	            {
	                $nov_Inc += $newIncAmt;
	            }
	            // dec
	            else if($newIncome === "Dec 2015")
	            {
	                $dec_Inc += $newIncAmt;
	            }
	        	        
	   }
   
    // expenses array containing all months
    $allMonths = array($jan_Exp, $feb_Exp, $mar_Exp, $apr_Exp, $may_Exp, $jun_Exp,
                        $jul_Exp, $aug_Exp, $sep_Exp, $oct_Exp, $nov_Exp, $dec_Exp,
                        $jan_Inc, $feb_Inc, $mar_Inc, $apr_Inc, $may_Inc, $jun_Inc,
                        $jul_Inc, $aug_Inc, $sep_Inc, $oct_Inc, $nov_Inc, $dec_Inc
                        );
                        
	//output as JSON
	    header("Content-type: application/json");
	    print(json_encode($allMonths, JSON_PRETTY_PRINT));

	
?>
