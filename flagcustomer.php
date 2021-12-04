<!DOCTYPE html>
<html>
	



<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<?php 
	include 'header/main-header.php'; 
	include('connection.php');
	
?>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                 <h2> <center>KLP BEVERAGES TRADING</center></h2>
   
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
		
<div class="content">
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Account Payables&nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Customer Name</th>
						<th>Contact Number</th>
						<th>Amount Due</th>
						<th>To Pay</th>
						<th>Bank Name</th>
						<th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                   <?php
				   $myDate = date('Y-m-d');
		//$result = $mysqli->query("SELECT * FROM beverages where d_date = '$myDate'") or die ($mysqli->error);
		//pre_r($result);
		$result = $mysqli->query("SELECT
		customer.cus_id,
customer.cus_name,
customer.cus_add,
customer.contact,
customersales.order_id,
customersales.amount,
customersales.s_id,
`status`.`status`,
customersales.bankname,
customersales.check_date,
customersales.checknum
FROM
customersales
INNER JOIN customer ON customersales.cus_id = customer.cus_id
INNER JOIN `status` ON customersales.s_id = `status`.s_id
where customersales.s_id = 2
 ") or die ($mysqli->error);
			while ($row = $result->fetch_assoc()):
		?>
					<tr>
						<td><?php echo $row['cus_name'];?></td>
						<td><?php echo $row['contact'];?></td>
						<td><?php echo $row['amount'];?></td>
						<td><?php echo $row['check_date'];?></td>
						<td><?php echo $row['bankname'];?></td>
						<td><a href="process_flagcustomer.php?customer=<?php echo  $row['cus_id'];?>"
								class="btn btn-primary bg-gradient-primary" style="width: 90px;">View</a></td>
					</tr>
		<?php endwhile;
		?>
                  </tbody>
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