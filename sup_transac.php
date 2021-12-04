
<!DOCTYPE html>
<html>
	<head> 
		<title> Supplier </title>
	</head>
			<?php  
			include('connection.php');
			include'sidebar.php';
			?>   
<!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $company_name = $_POST['companyname'];
			  $contact_number = $_POST['contact_number'];
              $city = $_POST['city'];
              $province = $_POST['province'];
              $zipcode= $_POST['zipcode'];
        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO supplier
                              (sup_id, company_name, contact_number, city, province, zipcode)
                              VALUES (Null,'{$comname}','{$connum}', '($city)', '($prov)', '($zipc)')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');
					
                break;
              }
            ?>
              <script type="text/javascript">window.location = "supplier.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>