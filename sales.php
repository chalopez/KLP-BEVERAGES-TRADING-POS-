<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
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
					<!--    <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

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
		

          <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Daily Sales')">Daily Sales</button>
  <button class="tablinks" onclick="openCity(event, 'Date Sales')">Date Sales</button>
</div>

<div id="Daily Sales" class="tabcontent">
  <table border="1">
		<thead>
			<th>UserID</th>
			<th>Username</th>
			<th>Login Date</th>
		</thead>
		<tbody>
		<?php
			$result = $mysqli->query("select * from customersales");
			while ($row = $result->fetch_assoc()):
				?>
				<tr>
					<td><?php echo $row['order_id']; ?></td>
					<td><?php echo $row['pay_id']; ?></td>
					<td><?php echo $row['date']; ?></td>
				</tr>
				<?php endwhile;
		?>
		</tbody>
	</table>
</div>

<div id="Date Sales" class="tabcontent">
  <form method="POST">
		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to">
		<input type="submit" value="Get Data" name="submit">
	</form>

	<table border="1">
		<thead>
			<th>UserID</th>
			<th>Username</th>
			<th>Login Date</th>
		</thead>
		<tbody>
		<?php
			if (isset($_POST['submit'])){
				include('connection.php');
				$from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));
				$result2 = $mysqli->query("select * from customersales where date between '$from' and '$to'");
				while ($row = $result2->fetch_assoc()):
					?>
					<tr>
						<td><?php echo $row['order_id']; ?></td>
					<td><?php echo $row['pay_id']; ?></td>
					<td><?php echo $row['date']; ?></td>
					</tr>
					<?php 
				endwhile;
			}
		?>
		</tbody>
	</table>
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

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</html>