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
    $jan = $feb = $mar = $apr = $may = $jun = array();
    $jul = $aug = $sep = $oct = $nov = $dec = array();
	
	$getTrans = query("SELECT trans_amount, trans_category, trans_time FROM transactions WHERE id = ?", $_SESSION["id"]);
	    if($getTrans === false)
	 
	    {
	        apologize("Error fetching all transaction data.");
	    }
	    
	    
	    // monthly details table
	    // loop through getTrans again
	    for($j = 0; $j < count($getTrans); $j++)
	    {
	        // access date and convert it to whatever format I want
	        $date = strtotime($getTrans[$j]["trans_time"]);
	        $newDate = date('M Y', $date);
	        
	        // access amount and convert it to an int
	        $getAmt = $getTrans[$j]["trans_amount"];
	        $intAmt = (int) $getAmt;
	        
	        // sort by category
	        if($getTrans[$j]["trans_category"] === "Expense")
	        {
	            // sort by month
	            // january
	            if($newDate === "Jan 2015")
	            {
	                $jan_Exp += $intAmt;
	                // if month is already inside the array...
	                if(in_array($newDate, $jan))
	                {
	                    array_push($jan, $jan_Exp);
	                }
	                else
	                {
	                    array_push($jan, $newDate, $jan_Exp);
	                }
	                
	            }
	            // february
	            else if($newDate === "Feb 2015")
	            {
	                $feb_Exp += $intAmt;
	                array_push($feb, $newDate, $feb_Exp);
	            }
	            // march
	            else if($newDate === "Mar 2015")
	            {
	               $mar_Exp += $intAmt;
	                array_push($mar, $newDate, $mar_Exp);
	            }
	            // april
	            else if($newDate === "Apr 2015")
	            {
	                $apr_Exp += $intAmt;
	                array_push($apr, $newDate, $apr_Exp);
	            }
	            // may
	            else if($newDate === "May 2015")
	            {
	                $may_Exp += $intAmt;
	                array_push($may, $newDate, $may_Exp);
	            }
	            // june
	            else if($newDate === "Jun 2015")
	            {
	                $jun_Exp += $intAmt;
	                array_push($jun, $newDate, $jun_Exp);
	            }
	            // july 
	            else if($newDate === "Jul 2015")
	            {
	                 $jul_Exp += $intAmt;
	                array_push($jul, $newDate, $jul_Exp);
	            }
	            // aug
	            else if($newDate === "Aug 2015")
	            {
	                 $aug_Exp += $intAmt;
	                array_push($aug, $newDate, $aug_Exp);
	            }
	            // sept
	            else if($newDate === "Sep 2015")
	            {
	                 $sep_Exp += $intAmt;
	                array_push($sep, $newDate, $sep_Exp);
	            }
	            // october
	            else if($newDate === "Oct 2015")
	            {
	                 $oct_Exp += $intAmt;
	                array_push($oct, $newDate, $mar_Exp);
	            }
	            
	            // start here!
	            // nov
	            else if($newDate === "Nov 2015")
	            {
                    $nov_Exp += $intAmt;
	                // if month is NOT inside the array...
	                if(!in_array($newDate, $nov))
	                {
	                    array_push($nov, $newDate);
	                }
	                
	                // if amount is NOT inside the array...
	                if(!in_array($nov_Exp, $nov))
	                {	                    
	                    array_push($nov, $nov_Exp);
	                }
	                // else if amount is already inside the array, replace it
	                else if(in_array($nov_Exp, $nov))
	                {
	                    $nov[$nov_Exp] = $nov_Exp;                    
	                }
	            }
	            // dec
	            else if($newDate === "Dec 2015")
	            {
	                 $dec_Exp += $intAmt;
	                array_push($dec, $newDate, $dec_Exp);
	            }
	        }
	        // else if category === income
	        else if($getTrans[$j]["trans_category"] === "income")
	        {
	            // sort by month
	            // january
	            if($newDate === "Jan 2015")
	            {
	                $jan_Inc += $intAmt;
	                array_push($jan, $jan_Inc);
	            }
	            // february
	            else if($newDate === "Feb 2015")
	            {
	                $feb_Inc += $intAmt;
	                array_push($feb, $feb_Inc);
	            }
	            // march
	            else if($newDate === "Mar 2015")
	            {
	                $mar_Inc += $intAmt;
	                array_push($mar, $mar_Inc);
	            }
	            // april
	            else if($newDate === "Apr 2015")
	            {
	                $apr_Inc += $intAmt;
	                array_push($apr, $apr_Inc);
	            }
	            // may
	            else if($newDate === "May 2015")
	            {
	                $may_Inc += $intAmt;
	                array_push($may, $may_Inc);
	            }
	            // june
	            else if($newDate === "Jun 2015")
	            {
	                $jun_Inc += $intAmt;
	                array_push($jun, $jun_Inc);
	            }
	            // july 
	            else if($newDate === "Jul 2015")
	            {
	                $jul_Inc += $intAmt;
	                array_push($jul, $jul_Inc);
	            }
	            // aug
	            else if($newDate === "Aug 2015")
	            {
	                $aug_Inc += $intAmt;
	                array_push($aug, $aug_Inc);
	            }
	            // sept
	            else if($newDate === "Sep 2015")
	            {
	                $sep_Inc += $intAmt;
	                array_push($sep, $sep_Inc);
	            }
	            // october
	            else if($newDate === "Oct 2015")
	            {
	                $oct_Inc += $intAmt;
	                array_push($oct, $oct_Inc);
	            }
	            // nov
	            else if($newDate === "Nov 2015")
	            {
	                $nov_Inc += $intAmt;
	                array_push($nov, $nov_Inc);
	            }
	            // dec
	            else if($newDate === "Dec 2015")
	            {
	                $dec_Inc += $intAmt;
	                array_push($dec, $dec_Inc);
	            }
	        }
	        
	    }
	    
	    //output as JSON
	    header("Content-type: application/json");
	    print(json_encode($nov, JSON_PRETTY_PRINT));
	
?>
