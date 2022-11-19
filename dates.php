<?php

     
// ███▓▒░░. SET LAST DAY IN (1) CURRENT MONTH (2) NEXT MONTH AND (3) PREVIOUS MONTH .░░▒▓███► 

    // From invoices/billing-confirmation-page
    // GRAB CURRENT DAY
        $todayDatez = date('Y-m-d');
        $userBillingDate = $todayDatez; 
        $next_billing_period_note = date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-01",strtotime($userBillingDate) ) )));
    //NEXT MONTH      
        $last_day_of_next_month = date("Y-m-t", strtotime($next_billing_period_note));

    //LAST MONTH
        $last_billing_period_note = date("Y-m-d",strtotime("-1 month",strtotime(date("Y-m-01",strtotime($userBillingDate) ) )));
        $last_day_of_last_month = date("Y-m-t", strtotime($last_billing_period_note));       

    //THIS MONTH  
        $last_day_of_this_month = date("Y-m-t", strtotime($userBillingDate));



// END OF ** SET LAST DAY IN (1) CURRENT MONTH (2) NEXT MONTH AND (3) PREVIOUS MONTH



     
// ███▓▒░░. GET LAST DAY OF NEXT MONTH FOR USERS DATE IN DB .░░▒▓███► 
        //  ___________________________________
        // |#######====================#######|
        // |#(1)*  LAST DAY USER MONTH   *(1)#|
        // |#**          /===\   ********  **#|
        // |*# {G}      | (") |             #*|
        // |#*  ******  | /v\ |    O N E    *#|
        // |#(1)         \===/            (1)#|
        // |##=========ONE DOLLAR===========##|
        // ------------------------------------

// GET LAST DAY OF NEXT MONTH *****************************************************************************************************
   
// From: invoices/previous-month-billing-log
$displayFullMonth =  date('F Y', strtotime($selectedMonth));
$display_month_and_year =  date('F Y', strtotime($user->billing_month));
$display_month =  date('F', strtotime($user->billing_month));

// From: invoices/nurse-select-billing-month
    // KEY DATE SOLUTION WHEN GIVEN A SPECIFIC DATE: https://stackoverflow.com/questions/10586615/current-date-2-months

    // WHERE DATE VALUE IS PROVIDED FROM USER IN DB:
$userBillingDate = $user->last_billing_note;
    // $userBillingString = $userBillingDate->format('Y-m-d');
$next_billing_period_note = date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-01",strtotime($userBillingDate) ) )));

    // Get the last day of month
$last_day_of_month = date("Y-m-t", strtotime($next_billing_period_note));

        // END OF ** GET LAST DAY OF NEXT MONTH *****************************************************************************************************




     
// ███▓▒░░. SET CURRENT DATE AND TIME IN EASTERN STANDARD TIME ZONE .░░▒▓███► 
        //  ___________________________________
        // |#######====================#######|
        // |#(1)* CURRENT DATE IN TIMEZONE (1)|
        // |#**          /===\   ********  **#|
        // |*# {G}      | (") |             #*|
        // |#*  ******  | /v\ |    O N E    *#|
        // |#(1)         \===/            (1)#|
        // |##=========ONE DOLLAR===========##|
        // ------------------------------------

// SET CURRENT DATE AND TIME IN EASTERN STANDARD TIME ZONE ******************************************************************************************
        // FROM: vb/day-tracker-for-beth

            // OLD METHOD (since CD days) NOT AS GOOD AS NEW METHOD BELOW - Set Last Day Of the Month
                // Specify the date
                    // $timezone  = -4; //(GMT -5:00) EST (U.S. & Canada)
                    // $dt = gmdate("Y-m-d", time() + 3600*($timezone+date("I")));
                    // $last_day_of_month = date("t", strtotime($dt));
 
 
            // UPDATED - BEST PHP EXAMPLE SO FAR TO GET CURRENT DATE TIME - FROM: 
                // Stack: https://stackoverflow.com/questions/470617/how-do-i-get-the-current-date-and-time-in-php
                // PHP Manual (TimeZone): https://www.php.net/manual/en/timezones.america.php
 

//From: ib/nurse-billing-todo-list
$ahoraEs = new DateTime(null, new DateTimeZone('America/New_York'));
$currentDia = $ahoraEs->format('m/d/y');
 
// GET LAST DAY OF CURRENT MONTH        
$ahoraEs = new DateTime(null, new DateTimeZone('America/New_York'));
        
$formatLastDay = $ahoraEs->format('Y-m-d H:i:s');

// DON"T change the date to m-d-Y for computing last day. Otherwise it would read Feb (28 days) as August (31 days) Ahora Es: 02-08-2022, returns 31 thinking we're in 8/2/22   ($displayAhora = $ahoraEs->format('m-d-Y');)      

$last_dia_es = date("t", strtotime($formatLastDay));
      

$currentDia = $ahoraEs->format('m-d-Y');
$current_dia_solemente = $ahoraEs->format('d');



// $displayCurrentDia = $ahoraEs->format('l F d, Y g:i a');

$displayCurrentDia = $ahoraEs->format('l F d, Y');
$displayCurrentHoras = $ahoraEs->format('g:i a');

$displayFullMonth = $ahoraEs->format('F'); //didn't end up using

?>

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2 style="color:red">Blood Pressure Readings as of {{ $displayCurrentDia }} at {{ $displayCurrentHoras }}</h2>  
            <h2 style="color:red">Blood Pressure Readings as of <?php echo $displayCurrentDia; ?> at <?php echo $displayCurrentHoras; ?></h2>  



<?php


     
// ███▓▒░░. Working with Dates On Billing Admin TOC .░░▒▓███► 
        //  ___________________________________
        // |#######====================#######|
        // |#(1)*  BILLING ADMIN TOC   *(1)#|
        // |#**          /===\   ********  **#|
        // |*# {G}      | (") |             #*|
        // |#*  ******  | /v\ |    O N E    *#|
        // |#(1)         \===/            (1)#|
        // |##=========ONE DOLLAR===========##|
        // ------------------------------------

// DISPLAY A GIVEN DATE FROM THE DB FOR SPECIFIC FIELD VALUE
$displayFullMonth =  date('F Y', strtotime($selectedMonth));

$displayFullMonth =  date('F Y', strtotime($user->dob));

// Working with dates in ib/billing-admin-toc

                // Specify the date
                $timezone  = -4; //(GMT -5:00) EST (U.S. & Canada)
                $dt = gmdate("Y-m-d", time() + 3600*($timezone+date("I")));
                
            // Get the first day of month
                $first_day_of_month = date("Y-m-01", strtotime($dt));
                
            // Get the last day of Current Month
                $last_day_of_current_month = date("Y-m-t", strtotime($dt));
            
            // Both formatted with time:    
                $firstDateTime = $first_day_of_month . ' 00:00:00'; 
                // $lastDateTime = $last_day_of_current_month . ' 23:59:59'; 
                // $currentMonthDateTime = $last_day_of_current_month . ' 23:59:59';
                
            //CONVERT TO JUST DATE - STRIP AWAY TIME
                $currentMonthYear =  date('F Y', strtotime($first_day_of_month));
                $currentMonthDateTime = $last_day_of_current_month . ' 23:59:59';
                
        
                // $MonthAgo = strtotime("-1 month"); //A month before today
                
            // Last Month FROM the first answer on: https://stackoverflow.com/questions/9911330/php-get-date-1-month
                $oneMonthAgo = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
                $last_day_of_last_month = date("Y-m-t", strtotime($oneMonthAgo));
                
                $lastMonthYear =  date('F Y', strtotime($last_day_of_last_month));
                $lastMonthDateTime = $last_day_of_last_month . ' 23:59:59';
            
            // Next Month    
                $oneMonthAhead = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
                $last_day_of_next_month = date("Y-m-t", strtotime($oneMonthAhead));
                
                $nextMonthYear =  date('F Y', strtotime($last_day_of_next_month));
                $nextMonthDateTime = $last_day_of_next_month . ' 23:59:59';
                
        // JUST THE DATE YYYY-MM-DD (no time)
            // $last_day_of_last_month
            // $last_day_of_current_month
            // $last_day_of_next_month
            
         // Last Day WITH 23:59:59 attached:
            // $lastMonthDateTime
            // $currentMonthDateTime
            // $nextMonthDateTime
                
                // $joeLastBillingNote = '2022-08-01'; 
                // THIS WORKS! $amyLastBilingNote = 'closed';
                // $joeLastBillingNote = '2022-07-31'; 
                //  $amyLastBilingNote = '2022-08-31'; 
                
                // // $amyLastBilingNote = $emptyUser->last_day_billing; 
                
                // if($amyLastBilingNote <= $joeLastBillingNote ){
                //     echo "<h2>Corinne's Last Billing Note (2022-08-31) is Included in your Search</h2>";
                    
                // }else{
                //     echo "<h2>Corinne's Last Billing Note is NOT (2022-08-31)- Excluded from your search</h2>";
                // }
                
                // $joeLastTimeBill = '2022-08-10'; 
                // $joeOneMonthAgo = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $joeLastTimeBill ) ) . "-1 month" ) );
                // echo "<h2>PLEASE GOD LET IT BE: $joeOneMonthAgo </h2>";
                
        ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Billing View (All Patients, active and inactive) - <?php echo date("F"); ?> <?php echo date("Y"); ?></h2>
        
        <!--https://dentcareteam.com/ihealth/list/admin/clinic/time/inventory-->
         <h3><a href="{{ url('/enrolled/patient/list') }}" class="btn btn-dark">Back To Admin Panel</a></h3>
  
  
  <!--<h2>Convert Days Button</h2>       -->
  <!--       <form method="POST" action="{{ url('testing/convert/dates/august/fifth') }}">-->
  <!--            {{ csrf_field() }}-->
  <!--              <div class="form-group text-center">-->
  <!--                  <button type="submit" class="btn btn-primary">Convert the Last Billing Note to Date Format</button>-->
  <!--              </div>-->
      
             
  <!--       </form>-->
         
  
  
  <h3>REAL FORM STARTS HERE, Current Last Day Date: {{ $last_day_of_current_month }}</h3>       
         <br>
         <hr>
         
           <form method="GET" action="{{ url('/run/current/monthly/billing/tool/epoch') }}">
                           
                                {{ csrf_field() }}
                           
            <div id="form-fields-section">         
            
                                                {{ csrf_field() }}

                
                              <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Month To Run Billing Report</label>
                
                                            <div class="col-sm-10">
                                                <div class="input-group m-b">
                                                    <!--<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">-->
                                                    <!--<select class="selectActivity" id="inlineFormCustomSelectPref">-->
                                                     <select class="custom-select my-1 mr-sm-2" id="endSearchDate" name="endSearchDate">
                                                        <option selected value="{{ $last_day_of_current_month }}">Select A Month</option>
                                                        <!--<option value="Phone Call">Phone Call</option>-->
                                                        <option value="{{ $last_day_of_current_month }}">{{ $currentMonthYear }}</option>
                                                        <option value="{{ $last_day_of_last_month }}">{{ $lastMonthYear }}</option>
                                                        <option value="{{ $last_day_of_next_month }}">{{ $nextMonthYear }}</option>
                                                      </select>
                                                    <!--<input type="textarea" placeholder="Enter the time spent with patient in minutes" name="clinictime" class="form-control" value="">--> 
                                                </div>
                                            </div>
                            </div>
                         
          
                <!--END OF END SEARCH DATE -->
                        <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Run The Billing Tool For The Current Month</button>
                        </div>
                    
        </div>
        

    </form>

Create CURRENT and NEXT MONTH Invoice Objects
    <option selected value="both">Both Days and Time</option>
            <option value="time_only">Time Only</option>  

    New Patient has CURRENT invoice for a complete log. Won't show up for nurses. Filter by billing_status = 'sent'          
            <option value="new_pt">New Pt</option>


Create CURRENT Invoice Object.             
            <option value="final">Final Bill</option>

ONLY sets NEXT MONTH USER field to 07/31/2044             
            <option value="flush">Flush Out</option>

QUESTION: Should we set NEXT MONTH field as 7/31/2044 ON an Invoice Object? 


<select class="custom-select my-1 mr-sm-2" id="invoice_stage" name="invoice_stage">
                                                
    <option selected value="sent">Sent To Wendy</option>
            <option value="proceed">Ready For Billing</option>
            <option value="hold">On Hold</option>
            <option value="0">Pending</option>

        </select>






<?php

//********************************** SINGULAR AND PLURAL SOLUTION *****************************************************

// FROM: https://stackoverflow.com/questions/4728933/function-switching-between-singular-and-plural

    function plural( $amount, $singular = '', $plural = 's' ) {
        if ( $amount === 1 ) {
            return $singular;
        }
        return $plural;
    }

    // where $displayEcwTotal was 1
    $display_formatted_billed_patients = ' Patient' . plural($displayEcwTotal);

    // where $displayTotalCountTracker was 4
    $display_formatted_total_patients = ' Patient' . plural($displayTotalCountTracker);
    
?>

  
    <div class="row wrapper border-bottom white-bg page-heading"> 
        <div class="col-lg-10">
            <h2 style="color:green">{{ $display_month_and_year }} Billing Log: <b>{{ ucwords($spelloutUsersSentToBilling) }} ({{ $displayEcwTotal }}) {{ $display_formatted_billed_patients }} Billed out of {{ $spelloutPotentialBilling }} ({{ $displayTotalCountTracker }}) Total {{ $display_formatted_total_patients }} In {{ $display_month }}</b> </h2>     
            
