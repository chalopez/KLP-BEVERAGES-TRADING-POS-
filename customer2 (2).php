<html>
  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  
<?php 
	include 'header/main-header.php'; 
	include('connection.php');
	//require_once('process_beverages.php');
	
	session_start();
	// will output supplier ID
	
	//$_GET['stockin'];
	
	$idbev = $_SESSION['suppid'];
	//echo $idbev;
	$result2 = $mysqli->query("SELECT * FROM supplier where sup_id =$idbev") or die ($mysqli->error);
		while ($row2 = $result2->fetch_assoc()):
		$sname = $row2['supname'];
		endwhile;
		

?>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                  <h2> Point of Sale Monitoring System</h2>
   
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <strong style="color: #007bff;" class="mt-2">Welcome! <?= ucfirst($user_session) ;?></strong> &nbsp;
                        </a>

                        <div class="user-menu dropdown-menu">
 <!--                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

       

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">


<div class ="container">
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">STOCK IN&nbsp;</h4>
            </div>
            
            <div class="card-body">
			<div class="row justify-content-center">
              <div class="table-responsive">	
			  
<table class="table " id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td>
		<!-- Table 1 -->
            <table  >
                <form action="process_beverages.php" method="POST">
                <tr>
				<td>
				<label>Supplier's Name</label>
				</td>
				<td>
				<input type="text" name="suppname" value="<?php echo $sname; ?>"  style="width: 200px;" readonly>
				
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Beverage Name</label>
						</td>
						<td>
						<select name="product" style="width: 200px;">
					<option disabled selected>-- Select --</option>
				<?php 

					$result = $mysqli->query("SELECT * FROM product 
ORDER BY p_name")
					or die($mysqli->error);
					while ($row = $result->fetch_assoc()):
					//while ($row = mysqli_fetch_array($result)) {
					 		# code...
					 	//echo '<option>'.$row['p_name'].'</option>';
					 //}	
					 
					echo "<option value='" . $row['p_id'] . "'>".$row['p_name']."</option>";
					endwhile;
					
					?>
					</select>
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Category</label>
				</td>
				<td>
				<select name="category" style="width: 200px;">
					<option disabled selected>-- Select --</option>
				<?php 

					$result2 = $mysqli->query("SELECT * FROM category")
					or die($mysqli->error);
					while ($row = $result2->fetch_assoc()):
					//while ($row = mysqli_fetch_array($result)) {
					 		# code...
					 	//echo '<option>'.$row['p_name'].'</option>';
					 //}	
					 
					echo "<option value='" . $row['c_id'] . "'>".$row['cat_name']."</option>";
					endwhile;
					
					?>
				</select>
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Quantity(Cases)</label>
				</td>
				<td>
				<input type="text" name="quantity" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Price / Case</label>
				</td>
				<td>
				<input type="text" name="price" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Price / Solo</label>
				</td>
				<td>
				<input type="text" name="solo" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Bad Order (Pieces)</label>
				</td>
				<td>
				<input type="text" name="badorder" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Expiration Date</label>
				</td>
				<td>
				<input type="date" name="date" style="width: 200px;"  />
				</td>
				</tr>
					
               <td>
				<button type="submit" class="btn btn-primary" name="save">Add</button>
				</td>
				</tr>
				</form>
            </table>
			<!-- end of Table 1 -->
        </td>
		
		
		
        <td>
            <table>
			<!-- Table 2 -->
					 <tr>
                        <th>Beverage Name</th>
						<th>Category</th>
						<th>Cases</th>
						<th>Date  and Time Received</th>
                      </tr>
                  
                  <tbody>
                    <?php
					$myDate = date('Y-m-d');
		//$result = $mysqli->query("SELECT * FROM beverages where d_date = '$myDate'") or die ($mysqli->error);
		//pre_r($result);
		$result3 = $mysqli->query("SELECT
product.p_id,
product.p_name,
supplierstock.b_id,
supplierstock.p_id,
supplierstock.c_id,
supplierstock.quantity,
supplierstock.price_case,
supplierstock.price_solo,
supplierstock.date_rec,
supplierstock.date_exp,
supplierstock.d_date,
category.cat_name,
category.c_id
FROM
supplierstock
INNER JOIN product ON supplierstock.p_id = product.p_id
INNER JOIN category ON supplierstock.c_id = category.c_id
where supplierstock.d_date = '$myDate'") or die ($mysqli->error);
			while ($row3 = $result3->fetch_assoc()):
		?>
					<tr>
						<td><?php echo $row3['p_name'];?></td>
						<td><?php echo $row3['cat_name'];?></td>
						<td><?php echo $row3['quantity'];?></td>
						<td><?php echo $row3['date_rec'];?></td>
					</tr>
		<?php endwhile;
		?>
                  </tbody>
            </table>
			<!-- end of Table 2 -->
        </td>
    </tr>
</table>

</div>
</div>
</div>
</div>

		</div>
        </div><!-- .animated -->
        </div><!-- .content -->
		<!--/.col-->
		<!-- Right Panel -->

 <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</html>