
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
        <link href="css/profile_style.css" rel="stylesheet">
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_dashboard.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>User's Booked Details</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a>Pages</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <strong>Detailed Booked User</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                           


                        <?php


    
    if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
          include('../include/connection.php');
            if (!empty($ID)) {
        
                $query = "SELECT * FROM reservation WHERE ID=$ID ";
                
                $query_run = mysqli_query($con, $query);
        
                if (mysqli_num_rows($query_run)>= 1) {
                    echo 'Best matches: <br>';
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    
                   
        
                
    
    
    ?>			


                            <div class="col-lg-12 animated fadeInRight">
                            <div class="mail-box-header">
                                <div class="float-right tooltip-demo">
                                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>
                                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                                </div>
                                <h2>
                                    User's Booked Details
                                </h2>
                                <div class="mail-tools tooltip-demo m-t-md">


                                    <h3>
                                        <span class="font-normal">User's Full Name: </span><?php echo htmlentities($row['surname']);?>, <?php echo htmlentities($row['firstname']);?>
                                    </h3>
                                    <h5>
                                        <span class="float-right font-normal"><?php echo htmlentities($row['DateCreated']);?></span>
                                        <span class="font-normal">From: </span><?php echo htmlentities($row['email']);?>
                                    </h5>
                                </div>
                            </div>
                                <div class="mail-box">
                                    <div class="mail-body">
                                        <p>
                                            Hello Admin!
                                            <br/>
                                            <br/>
                                            <?php echo htmlentities($row['surname']);?>, <?php echo htmlentities($row['firstname']);?> just booked for an accomodation at <?php echo htmlentities($row['university']);?> university which the name of the accomodation is <?php echo htmlentities($row['accommodation']);?>  
                                           </p>
                                            <p> Type of Room <?php echo htmlentities($row['firstname']);?> want is <?php echo htmlentities($row['room_type']);?>
                                            and his/her arrival date to the accomodation is <?php echo htmlentities($row['eta']);?>
                                             And the duration of stay will be <?php echo htmlentities($row['duration']);?>
                                           
                                        
                                            You can contact this user's phone number by clicking the number displayed 
                                            <a href="tel:<?php echo htmlentities($row['telephone']);?>" class="text-navy"><?php echo htmlentities($row['telephone']);?></a> 
                                            and email directly . <a href="mailto:<?php echo htmlentities($row['email']);?>" class="text-navy"><?php echo htmlentities($row['email']);?></a> 
                                        </p>
                                        <p>
                                          
                                    
                                    This message is encrypted to both the user booked and the administrator of the website.
                                    </p>
                                    </div>
                                    <div class="mail-attachment">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> Documentation | Valid ID - </span>
                                            <a href="../assets/images/booked/<?php echo htmlentities($row['image']);?>">Download</a>
                                            |
                                            <a href="../assets/images/booked/<?php echo htmlentities($row['image']);?>">View Valid ID</a>
                                        </p>
                                        <div class="attachment">
                                            
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="../assets/images/booked/<?php echo htmlentities($row['image']);?>">
                                                        <span class="corner"></span>

                                                        <div class="image">
                                                            <img alt="image" class="img-fluid" src="../assets/images/booked/<?php echo htmlentities($row['image']);?>">
                                                        </div>
                                                        <div class="file-name">
                                                        <?php echo htmlentities($row['image']);?>
                                                            <br/>
                                                            <small>Added: <?php echo htmlentities($row['DateCreated']);?></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="mail-body text-right tooltip-demo">
                                        <a class="btn btn-sm btn-white" href="#"><i class="fa fa-reply"></i> Reply</a>
                                        <a class="btn btn-sm btn-white" href="#"><i class="fa fa-arrow-right"></i> Forward</a>
                                        <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
                                        <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <?php
                        
                    }
                 } else {
        ?>
	


    
    <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Details Found</h3>
    </div>
    
<?php 
                  //  echo 'No results found!';
                }
            }
        } ?>	
    


                            </div>
                        </div>
                    </div>
				</div>
                <!-- footer -->
                <?php include_once 'footer/footer.php';?>
				<!-- end footer -->
			</div>
            
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>
        <!-- <script>Library</script> -->
		<!-- <script> import</script> -->
	</body>
</html>