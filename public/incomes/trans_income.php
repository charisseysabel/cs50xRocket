<!doctype html>
<html>
	<head>
        <!-- fonts -->
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

        <!-- js libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <!-- generator -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jqc-1.11.3,moment-2.10.6,dt-1.10.10,b-1.1.0,se-1.1.0/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">

		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/s/dt/jqc-1.11.3,moment-2.10.6,dt-1.10.10,b-1.1.0,se-1.1.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.trans_income.js"></script>

		<!-- my scripts -->
        <script src="../js/scripts.js"></script>		

        <!-- CASHFLOW TAB: chart.js by Nick Downie -->
        <script src="../js/Chart.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/cash_chart.js"></script>
		
        <!-- my styles -->
        <link href="../css/dash_style.css" rel="stylesheet"/>
        <link href="../css/inv_style.css" rel="stylesheet" />

        <!-- favicons generated by favic-o-matic -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/favicon/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
		
		<title>CS50x: rocket | Income</title>

	</head>
	<body>
         <div class="menu_panel">
           			<div id="menu">
		                <ul>
		                    <li><a href="../dashboard.php"> Dashboard </a></li>
		                    <li><a href="../cashflow.php"> Report </a></li>
		                    <li><a href="../editor/inv_editor.php"> Inventory </a></li>
		                    <li><a href="../incomes/trans_income.php"> Income </a></li>
		                    <li><a href="../expenses/expense.php"> Expense </a></li>		                    
		                  <!--  <li><a href="transactions.php"> Transactions </a></li> -->
		                </ul>
                	</div>
                	
                	<div id="extra_options">
		                <ul>
		                    <li><a href="../walkthrough.php"> Help </a></li>
		                    <li><a href="../settings.php"> Settings </a></li>
		                    <li><a href="../logout.php"> Logout </a></li>
		                </ul>
                	</div>
           		</div> <!-- menu_panel -->
           		
           		<!-- dynamic content starts here -->
           		<div class="canvas">
                    <div class="mid">
                        <h1>Income</h1>
                            <div class="content">
                                <!-- canvas for charts -->
                            	<div id="canvas_div">             
		                            <canvas id="income"></canvas>
		                        </div>
                            			
			                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="trans_income" width="100%">
				                    <thead>
					                    <tr>
						                    <th>Transaction</th>
						                    <th>Category</th>
						                    <th>Amount</th>
						                    <th>Date</th>
					                    </tr>
				                    </thead>
			                    </table>
                            </div> <!-- collapse content -->
                    </div> <!-- collapse mid -->
              </div> <!-- collapse canvas -->


	</body>
<script>
// radar chart for expenses tab
    $.getJSON("../inc_json_chart.php", function(data) {
        var inc_Rlabel = [], inc_Rvalue = [];
        for(i = 0; i < data.length; i++) {
            inc_Rlabel.push(data[i].income_category);
            inc_Rvalue.push(Number(data[i].income_amount));
        }

        var income_data = {
            labels: inc_Rlabel,
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: inc_Rvalue
                }
            ]
        };

        var rOptions = {};

        var ctx_inc = document.getElementById('income').getContext("2d");
        var incRadar = new Chart(ctx_inc).Radar(income_data);

    });

</script>
</html>
