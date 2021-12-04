<!DOCTYPE html>
<html>
<head>
<style>

body {
    margin-top: 20px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */

</style>
</head>

<!------ 
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
Include the above in your HEAD tag 
---------->
<link href="Report/bootstrap.min.css" rel="stylesheet">
<script src="Report/js/bootstrap.min.js"></script>
<script src="Report/js/jquery-1.11.1.min.js"></script>

<?php
include('connection.php');
if(isset($_POST['purchased'])) {
	$grandtotal = $_POST['gtotal'];
	$cash = $_POST['money'];
	$change = $_POST['change'];
}
$result = $mysqli->query("SELECT
product.p_name,
category.cat_name,
purchase.pur_id,
purchase.total,
purchase.quant,
beverages.b_id,
beverages.price_case,
purchase.order_id
FROM
purchase
INNER JOIN beverages ON purchase.b_id = beverages.b_id
INNER JOIN product ON beverages.p_id = product.p_id
INNER JOIN category ON beverages.c_id = category.c_id
") or die ($mysqli->error);
?>

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>KLP Beverages Trading</strong>
                        <br>
                        P-2 Poblacion
                        <br>
                        Don Carlos, Bukidnon
                        <br>
                        <abbr title="Phone">Mobile #:</abbr> 09055940337
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php date_default_timezone_set('UTC');
									echo date('l jS \of F Y h:i:s A');						
									?></em>
                    </p>
                    
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
				
                <table class="table table-hover">
				<form action="purchase.php" method="POST">
                 
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
							<th>Price</th>
                            <th>Total<th>
							<!------ 
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th> ---------->
                        </tr>
                   
					<?php
					while ($row = $result->fetch_assoc()):
					?>
                        <tr>
                        <td><?php echo $row['p_name'];?></td>
						<td><?php echo $row['quant'];?></td>
						<td><?php echo $row['price_case'];?></td>
						<td><?php echo $row['total'];?></td>
                        </tr>
                        <?php endwhile;	?>
                        
						
						 <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Grandtotal: </strong>
                            </p>
                            <p>
                                <strong>Cash: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong><?php echo $grandtotal; ?> </strong>
                            </p>
                            <p>
                                <strong><?php echo $cash; ?> </strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Change: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong> <?php echo $change; ?> </strong></h4></td>
                        </tr>
						
						 <tr>
                            <td colspan ="4">				
				<button type="submit" class="button button2" name="payment" style="width: 100%;" >Back
                </button>
				</form>
				
				<form action="process_purchasedelete.php" method="POST">
				<button type="submit" class="button" name="purdel" style="width: 100%;" onclick="window.print() ">Print</button>
				</td>
				</tr>
				
				</form>
				
				 </table>
            </div>
        </div>
    </div>
</html>