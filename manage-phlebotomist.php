<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for record deletion
if($_GET['action']=='delete'){    
$pid=intval($_GET['pid']);    
$query=mysqli_query($con, "delete from tblphlebotomist where id='$pid'");
echo '<script>alert("Record deleted")</script>';
  echo "<script>window.location.href='manage-phlebotomist.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid-Tms | Manage Phlebotomist</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<style>
	   a.shower {
  cursor: pointer;
  position: relative;
  display: inline-block;
  padding: 10px 150px;
  color: #04335a;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  text-decoration: none;
  font-size: 20px;
  overflow: hidden;
  transition: 0.5s;
  color: Black;
  background: #2196f3;
  box-shadow: 0 0 10px #2196f3, 0 0 40px #2196f3, 0 0 10px #2196f3;
} 
 footer {
	  background:#D84315;
  }
  @media print{
	  /* Hide eevery other element */
	  body *{
		  visibility:hidden;;
		  
	  }
	 /* Then displaying print container elements */
  .print-container,.print-container *{
		 visibility: visible;
	 }	 
  } 
	</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
  <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid"style="color:black;">
<button onClick="window.print()" class=" fa fa-print"style="background:lightblue;">print</button><br><br>
    			 
   
    
                    <!-- Page Heading -->
					 <a class="shower" href="#">Manage Phlebotomist</a><br><br>
                    


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"style="color:black;">Phlebotomist Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"style="color:black;">
                                    <thead>
                                        <tr>
                                            <th>Serial no.</th>
                                            <th>Employee Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Serial no.</th>
                                            <th>Employee Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                             <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select * from tblphlebotomist");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>

                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['EmpID'];?></td>
                                            <td><?php echo $row['FullName'];?></td>
                                            <td><?php echo $row['MobileNumber'];?></td>
                                             <td><?php echo $row['RegDate'];?></td>
                                            <td>

                                <a href="edit-phlebotomist.php?pid=<?php echo $row['id'];?>"><i class="fas fa-edit" style="color:blue"></i></a> 

                                <a href="manage-phlebotomist.php?pid=<?php echo $row['id'];?>&&action=delete" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true" style="color:red" title="Delete this record"></i></a>
								</td>
                                        </tr>
                        <?php $cnt++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="py-4 bg-red">
    <div class="container"">
      <p class="m-0 text-center text-white"style="color:green;">Copyright &copy;2021 Sun Healthcare All Rights Reserved </p>
    </div>
    <!-- /.container -->
  </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php');?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
<?php } ?>