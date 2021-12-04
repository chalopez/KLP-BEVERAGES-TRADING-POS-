<!DOCTYPE html>
<html>
	



<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<?php 
	include 'header/main-header.php'; 
	include('connection.php');
	$myDate = date('Y-m-d');
?>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                <h2> <center>KLP BEVERAGE TRADING</center></h2>
   
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
              <h4 class="m-2 font-weight-bold text-primary"><form action="process_beverages.php" method="POST"> 
			  From<input type="date" name="date1" style="width: 200px;"  />
			  To<input type="date" name="date2" style="width: 200px;"/> 
			  <button type="submit" class="btn btn-primary" name="save">Search</button> </form></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Beverage Name</th>
						<th>Category</th>
						<th>Cases</th>
                      </tr>
                  </thead>
                  <tbody>
                   <?php
				
	  $result = $mysqli->query("SELECT
purchased.quant,
category.cat_name,
product.p_name,
purchased.p_date
FROM
purchased
INNER JOIN beverages ON purchased.b_id = beverages.b_id
INNER JOIN product ON beverages.p_id = product.p_id
INNER JOIN category ON beverages.c_id = category.c_id
where purchased.p_date BETWEEN '2021-10-15' and '2021-11-21'") or die ($mysqli->error);
			while ($row = $result->fetch_assoc()):
				
		
		?>
					<tr>
						<td><?php echo $row['p_name'];?></td>
						<td><?php echo $row['cat_name'];?></td>
						<td><?php echo $row['quant'];?></td>
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