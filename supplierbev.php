<!DOCTYPE html>
<html>
	<head> 
		
	</head>
	
<?php  
	include('connection.php');
	include'includes/sidebar.php';
	
?>
<body>


  <div class="content">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">SUPPLIER&nbsp;</h4>
            </div>
            
            <div class="card-body">
			<div class="row justify-content-center">
              <div class="table-responsive">
			  <form action="process_supplierbev.php" method="POST">
                <table class="table " id="dataTable" width="100%" cellspacing="0">        
                 <thead>
					<tr>
						<th>Supplier's Name</th>
						<th>Supplier's Address</th>
						<th colspan="2">Contact Number</th>
						
						
					</tr>
				</thead>
						<td>
						<input type="text" name="supname" style="width: 200px;">
						</td>
                     
			
				<td>
				<input type="text" name="supadd" style="width: 300px;">
				</td>
				
				
				<td>
				<input type="text" name="supnum" style="width: 200px;">
				</td>
				
				
				
				<td>
				<button type="submit" class="btn btn-primary" name="supplier">Add</button>
				</td>
				</tr>
				</table>
				</form>
    </div>             

<div class ="container">
		<?php //include('connection.php');
		$myDate = date('Y-m-d');
		//$result = $mysqli->query("SELECT * FROM beverages where d_date = '$myDate'") or die ($mysqli->error);
		//pre_r($result);
		$result = $mysqli->query("SELECT * FROM supplier") or die ($mysqli->error);
		?>
		
		<div class="row justify-content-center">
			<table class ="table">
				<thead>
					<tr>
						<th>Supplier's Name</th>
						<th>Supplier's Address</th>
						<th>Contact Number</th>
						<th colspan="2">Action</th>
						
					</tr>
				</thead>
				
		<?php
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
		</div>



					</thead>
                  <tbody>
                   
                  </tbody>
                </table>
				</form>
              </div>
            </div>
          </div>
	 </div>
</body>
</html>