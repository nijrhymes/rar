<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Dashboard</title>
        <!-- style css php -->
        <?php include_once 'css_style/style.php';?>

         <!-- library css -->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_form.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
                <div class="col-12">
                <br>
                <h3 class="titulo-tabla">Record Data Table Using PHP</h3>
                <hr>

          

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Country</th>
                                        <th>University</th>
                                        <th>Office</th>
                                        <th>Max Budget</th>
                                        <th>Pick Up</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                <?php
                        include('../include/connection.php');

                        $ret=mysqli_query($con,"select * from booking_assist ORDER by ID desc
                        LIMIT 5000");
                        while ($row=mysqli_fetch_array($ret)) 
                        {
                        ?>
                                        <tr>
                                            <td><?= $row['ID'] ;?></td>
                                            <td><?= $row['fullname'] ;?></td>
                                            <td><?= $row['country'] ;?></td>
                                            <td><?= $row['university']; ?></td>
                                            <td><?= $row['accommodationid'] ;?></td>
                                            <td>$ <?= $row['maxbudget'] ;?></td>
                                            <td><?= $row['pickup']; ?></td>
                                            <td><?= $row['datecreated'] ;?></td>
                                            <td>
                                                <?php
                                                echo "<a href='detailed_assist.php?ID=". $row['ID'] ."' title='View Record' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>";
                                                echo "<a href='add-assist.php?ID=". $row['ID'] ."' title='Update Record' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                echo "<a href='delete_assist.php?ID=". $row['ID'] ."' title='Delete Record' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                            </td>
                                        </tr>
                                   
                                        

                        <?php } ?>
                                </tbody>                          
                            </table>
                      
                <a href="add-assist.php" class="btn btn-success pull-left">Add Booking Assist</a>

            </div>
					
				</div>
                <!-- footer -->
                <?php include_once 'footer/footer.php';?>
				<!-- end footer -->
			</div>
            
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>

        <!-- library js -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        
        <!-- internal script -->
        <script src="js/export.js"></script>
		<!-- <script> import</script> -->
	</body>
</html>