<html>
  
<?php 
	include 'header/main-header.php'; 
	include('connection.php');
	
?>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                  
   
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
              <h4 class="m-2 font-weight-bold text-primary">SUPPLIER&nbsp;</h4>
            </div>
            
            <div class="card-body">
			<div class="row justify-content-center">
              <div class="table-responsive">	
			  
<table class="table " id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td>
		<!-- Table 1 -->
            <table  >
                <form action="process_supplierbev.php" method="POST">
                <tr>
				<td>
				<label>Supplier's Name</label>
				</td>
				<td>
				<input type="text" name="supname" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Supplier's Address</label>
				</td>
				<td>
				<input type="text" name="supadd" style="width: 200px;">
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Contact Number</label>
				</td>
				<td>
				<input type="text" name="supname" style="width: 200px;">
				</td>
				</tr>
					
               <td>
				<button type="submit" class="btn btn-primary" name="supplier">Add</button>
				</td>
				</tr>
				</form>
            </table>
			<!-- end of Table 1 -->
        </td>
		
		 <td>
		<div class="b-example-divider"></div>
		</td>
		
        <td>
            <table>
			<!-- Table 2 -->
					<tr>
						<th>Supplier's Name</th>
						<th>Supplier's Address</th>
						<th>Contact Number</th>
						<th colspan="2">Action</th>
						
					</tr>
				
		<?php
		include('connection.php');
		$result = $mysqli->query("SELECT * FROM supplier") or die ($mysqli->error);
			while ($row = $result->fetch_assoc()):
		?>
					<tr>
						<td><?php echo $row['supname'];?></td>
						<td><?php echo $row['supadd'];?></td>
						<td><?php echo $row['supnum'];?></td>
						
						<td><a href="process_purchase.php?delete=<?php echo $row['pur_id'];?>"
								class="btn btn-danger" style="width: 90px;">Cancel</a></td>
					</tr>
					<tr>
				
		<?php endwhile;	?>
		
				</form>
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