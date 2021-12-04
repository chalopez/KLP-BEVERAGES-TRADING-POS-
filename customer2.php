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
	
	$idbev = $_SESSION['cus_id'];
	//echo $idbev;
	$result2 = $mysqli->query("SELECT * FROM customer where sup_id =$idbev") or die ($mysqli->error);
		while ($row2 = $result2->fetch_assoc()):
		$sname = $row2['supname'];
		endwhile;
		

?>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                  <h2> KLP BEVERAGES TRADING</h2>
   
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
                    <?php
					$myDate = date('Y-m-d');
		//$result = $mysqli->query("SELECT * FROM beverages where d_date = '$myDate'") or die ($mysqli->error);
		//pre_r($result);
		$result3 = $mysqli->query("SELECT
customer.cus_id,
customer.cus_name,
customer.cus_add,
customer.contact
FROM
customer

ORDER BY
customer.cus_name ASC
") or die ($mysqli->error);
			while ($row3 = $result3->fetch_assoc()):
		?>
					<tr>
						<td><?php echo $row3['cus_name'];?></td>
						<td><?php echo $row3['cus_add'];?></td>
						<td><?php echo $row3['contact];?></td>

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