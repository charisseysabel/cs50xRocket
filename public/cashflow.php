<?php
	/**
	 *	cashflow.php
	 *	configures the cashflow page.
	 */
	
	// configuration
	require("../includes/config.php");
	require("../includes/render_dash.php");
	
	// all expenses variable
	$jan_Exp = $feb_Exp = $mar_Exp = $apr_Exp = $may_Exp = $jun_Exp = 0;
    $jul_Exp = $aug_Exp = $sep_Exp = $oct_Exp = $nov_Exp = $dec_Exp = 0;
	
	// all income variable
	$jan_Inc = $feb_Inc = $mar_Inc = $apr_Inc = $may_Inc = $jun_Inc = 0;
    $jul_Inc = $aug_Inc = $sep_Inc = $oct_Inc = $nov_Inc = $dec_Inc = 0;
    
    // month arrays
    $jan = $feb = $mar = $apr = $may = $jun = [];
    $jul = $aug = $sep = $oct = $nov = $dec = [];

    // get total income and expenses
    $totExp = $totInc = 0;

	
	// if user reached page via GET...
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
	    // get beginning cash on hand
	    $cash = [];
	    $getCash = query("SELECT cash_on_hand FROM users WHERE id = ?", $_SESSION["id"]);
	    if($getCash === false)
	    {
	        apologize("Error fetching beginning cash in hand.");
	    }
	    else
	    {
	        foreach($getCash as $cashData)
	        {
	            $cash[] = [
	                "cash_on_hand" => $cashData["cash_on_hand"]
	            ];
	        }
	    }
	    
	    
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
	    
	    // sort through expenses, add the total amount
	    for($i = 0; $i < count($getExpense); $i++)
	    {
	        // access amount and convert it into an int
	        $convertToInt = $getExpense[$i]["exp_amount"];
	        $new_amount = (int) $convertToInt;
	        
	        // add expense amount
	        $totExp += $new_amount;	        
	    }
	    
	    // sort income, add total amount
	    for($j = 0; $j < count($getIncome); $j++)
	    {
	        // access amount and convert it into an int
	        $convertIncome = $getIncome[$j]["income_amount"];
	        $incomeInt = (int) $convertIncome;
            
            // add income amount
	        $totInc += $incomeInt;	    
	    }
	    
        // calculate the profit        
        $profit = $totInc - $totExp;


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
	   	    
	    // insert data in proper month arrays
	    array_push($jan, "Jan 2015", number_format($jan_Inc, 2), number_format($jan_Exp, 2), number_format(($jan_Inc - $jan_Exp), 2) );
	    array_push($feb, "Feb 2015", number_format($feb_Inc, 2), number_format($feb_Exp, 2), number_format(($feb_Inc - $feb_Exp), 2) );
	    array_push($mar, "Mar 2015", number_format($mar_Inc, 2), number_format($mar_Exp, 2), number_format(($mar_Inc - $mar_Exp), 2) );
	    array_push($apr, "Apr 2015", number_format($apr_Inc, 2), number_format($apr_Exp, 2), number_format(($apr_Inc - $apr_Exp), 2) );
	    array_push($may, "May 2015", number_format($may_Inc, 2), number_format($may_Exp, 2), number_format(($may_Inc - $may_Exp), 2) );
	    array_push($jun, "Jun 2015", number_format($jun_Inc, 2), number_format($jun_Exp, 2), number_format(($jun_Inc - $jun_Exp), 2) );
	    array_push($jul, "Jul 2015", number_format($jul_Inc, 2), number_format($jul_Exp, 2), number_format(($jul_Inc - $jul_Exp), 2) );
	    array_push($aug, "Aug 2015", number_format($aug_Inc, 2), number_format($aug_Exp, 2), number_format(($aug_Inc - $aug_Exp), 2) );
	    array_push($sep, "Sep 2015", number_format($sep_Inc, 2), number_format($sep_Exp, 2), number_format(($sep_Inc - $sep_Exp), 2) );
	    array_push($oct, "Oct 2015", number_format($oct_Inc, 2), number_format($oct_Exp, 2), number_format(($oct_Inc - $oct_Exp), 2) );
	    array_push($nov, "Nov 2015", number_format($nov_Inc, 2), number_format($nov_Exp, 2), number_format(($nov_Inc - $nov_Exp), 2) );
	    array_push($dec, "Dec 2015", number_format($dec_Inc, 2), number_format($dec_Exp, 2), number_format(($dec_Inc - $dec_Exp), 2) );
	    
	    // expenses array containing all months
        $allMonths = array(
                        $jan, $feb, $mar, $apr, $may, $jun,
                        $jul, $aug, $sep, $oct, $nov, $dec
                        );
                        	
		//render the custom hompage HTML
		render("cash_main.php", ["title" => "Report", "cash" => $cash, "totExp" => number_format($totExp, 2), "totInc" => number_format($totInc, 2), "profit" => number_format($profit, 2), "allMonths" => $allMonths ] );
	
	} // collapse if statement
        
?>















