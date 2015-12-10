<!--
    inv_main.php
    main content for the inventory tab (HTML)
-->

<div class="mid">
    <h1>Inventory</h1>
        <div class="content">
            <!-- table buttons -->
                <div class="inv_btn">
                    <a href="add_form.php" type="button">Add</a>
                    
                    <select name="filter" id="filter" onchange="setFilter(this.value);">
		                    <option disabled selected value>Filter</option>
		                    <option value="allItems_ajax">All</option>
		                    <option value="caffe_ajax">Caffeteria</option>
		                    <option value="food_ajax">Food</option>
		                    <option value="drinks_ajax">Drinks</option>
		            </select>
		            
		            <form method="post" action="search_inv_ajax.php?go" id="search_form" >
		                <input type="text" name="name" placeholder="Search inventory" id="searchbox"/>
		                <input type="submit" name="submit" value="Search" id="search_btn"/>
		            </form>                   
                
                </div>
        
            <!-- search  -->

            <!-- TABLE -->
                <div id="inv_tbl">
                
                    <table class="table table-striped" id="tblSearch">
	                    <thead>
		                    <tr>
			                    <th title="The name of your product">Product Name</th>
			                    <th title="The category in which your product belongs.">Category</th>
			                    <th class="amount" title="Unit price is the cost of one unit of measure of an item.">Unit Price</th>
			                    <th class="amount" title="Retail price is the price of your product when it is sold for consumption.">Retail Price</th>
			                    <th class="amount" title="Your profit for each unit.">Est. profit per unit</th>			
			                    
		                    </tr>
	                    </thead>
	
	                    <tbody>
	                        <?php foreach($allInfo as $info): ?>
	                            <tr>
	                                <td> <span class="trans_name"><?= $info['product'] ?></span> <br>
	                                    <span class="trans_date"><?= $info["supplier_name"] ?></span>
	                                </td>

	                                <td> <?= $info["category"] ?> </td>
	                                <td class="amount">$ <?= $info["unit_price"] ?> </td>
	                                <td class="amount">$ <?= $info["retail_price"] ?> </td>
	                                <td class="amount">$ <?= number_format(($info["unit_price"] - $info["retail_price"]), 2) ?></td>
                                    <td> <span class="td_link"><a href="edit_inv.php?product=<?= $info['product']?>">Edit</a></span> <br>
                                         <span class="td_link"><a href="del_inv.php?product=<?= $info['product']?>">Delete</a></span>
                                    </td>

	                            </tr>
	                        <?php endforeach ?>


	                    </tbody>
                    </table>
              </div> <!-- collapse inv_tbl -->
              
              <div id="dataTbl">
                    <table class="table table-striped" id="data_table">
                        <thead>
                            <tr>
                                <th>Header 1</th>
                                <th>Header 2</th>
                            </tr>
                        <thead>
                        <tbody>
                            <tr>
                                <td>Row 1</td>
                                <td>ROw 2</td>
                            </tr>
                        </tbody>
                    </table>
              </div> <!-- collapse dataTbl-->
        </div> <!--collapse content -->
</div><!-- collapse mid -->

<script>
$(document).ready(function () {
    $('data_table').DataTable();
});

</script>
