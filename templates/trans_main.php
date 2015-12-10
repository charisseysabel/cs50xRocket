<!--
    trans_main.php
    main content for the transactions tab (HTML)
-->
<div class="mid">   
    <h1>Transactions</h1>
    
    <div class="content">
		<div class="inv_btn">
        	<a href="add_income.php" type="button">Add Income</a>
            <a href="add_expense.php">Add Expense</a>                  
        </div>
       
        <!-- canvas for charts -->
    	<div id="canvas_div">             
            <canvas id="expenses"></canvas>
		    <canvas id="income"></canvas>
		</div>
		
		<div id="trans_tbl">
			<table id="trans_table_id" class="table table-striped" cellspacing="0" width="100%">
            	<thead>
	                <tr>
						<th>Transaction</th>
                        <th>Category</th>
                        <th>Sub-category</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                <thead>
                <tfoot>
                    <tr>
                        <th>Transaction</th>
                        <th>Category</th>
                        <th>Sub category</th>
                        <th>Amount</th>
                        <th>Time</th>
                   </tr>
               </tfoot>
               <tbody>
               </tbody>
        </table>        
      </div> <!-- collapse trans_tbl -->
                
    </div> <!-- collapse content -->
</div> <!-- collapse mid -->
