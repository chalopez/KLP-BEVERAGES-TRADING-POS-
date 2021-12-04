<html>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<script src="script/bootstrap.bundle.min.js"></script>
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
	
 <script type="text/javascript">
   function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result =  parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
			
			var txtFourthNumberValue = document.getElementById('txt4').value / 100;
			var result2 =  parseInt(txtFirstNumberValue) * txtFourthNumberValue;
			var result3 =  parseInt(txtFirstNumberValue) - result2;
            if (!isNaN(result3)) {
                document.getElementById('txt5').value = result3;
            }
        }
</script>
 
<?php
session_start();
include 'header/main-header.php'; 
include('connection.php');
	$cid = $_SESSION['cusid'] ;
	$mopid = $_SESSION['mopid'] ;
	$tot =  $_SESSION['total'];
	
$result = $mysqli->query("SELECT * FROM ordernum")
or die($mysqli->error); 
$row = mysqli_fetch_assoc($result);
$number=$row['ord_id'];
$number++;

$result2 = $mysqli->query("SELECT * FROM customer 
where cus_id= $cid")or die($mysqli->error);
		
		
	$row2 = mysqli_fetch_assoc($result2);
	$cusname=$row2['cus_name'];	
	$cusadd=$row2['cus_add'];	
	$cusnum=$row2['contact'];	

$ponum = str_pad($number, 5, "0", STR_PAD_LEFT);
//echo $ponum;
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
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Cash Payment Method&nbsp;</h4>
            </div>
            
            <div class="card-body">
			<div class="row justify-content-center">
              <div class="table-responsive">
			  
    <table class="table " id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td>
		<!-- Table 1 -->
		<form action="process_bayadcash.php" method="POST">
            <table  >
					
				<tr>
				<td>
				<label>Purchase Order #</label>
				</td>
				<td>
				<input type="text" value="<?php echo str_pad($number, 5, "0", STR_PAD_LEFT); ?>" name="ponum" style="width: 200px;" readonly>
				</td>
				</tr>
					
				<tr>
				<td>
				<label>Customer Name</label>
				</td>
				<td>
				<input type="text" value="<?php echo $cusname; ?>" name="cusname" style="width: 200px;" readonly>
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Amount Due:</label>
				</td>
				<td>
				<input type="text" border="none" value="<?php echo $tot; ?>" name="gtotal" id="txt1"  style="width: 200px;" readonly>
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Discount %</label>
				</td>
				<td>
				<input type="text" border="none"  name="discount" id="txt4"   style="width: 200px" onkeyup="sum();" >
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Discounted Amount</label>
				</td>
				<td>
				<input type="text" border="none"  name="discamount" id="txt5"   style="width: 200px" onkeyup="sum();" >
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Cash</label>
				</td>
				<td>
				<input type="text" border="none"  name="money" id="txt2"   style="width: 200px" onkeyup="sum();" >
				</td>
				</tr>
				
				<tr>
				<td>
				<label>Change</label>
				</td>
				<td>
				<input type="text" border="none"  name="change" id="txt3" style="width: 200px;" >
				</td>
				</tr>
				
				<tr>
				<td>
				<button type="submit" class="btn btn-primary" name="save">Save</button>
				</td>
				</tr>
				
				
		 </table>
	</form>
	</td>
	</tr>
  </table>  
</div>
</div>
</div>

</div>
</div>
</div>
</div>

		</div>
		</div>
        </div><!-- .animated -->
        </div><!-- .content -->
		<!--/.col-->
		<!-- Right Panel -->


</html>