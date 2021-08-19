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
                        <h2>Detailed Landlord</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Landlord</strong>
                            </li>
                        </ol>
                    </div>
                </div>
                <br>
                
                <?php


    
if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
      include('../include/connection.php');
        if (!empty($ID)) {
    
            $query = "SELECT * FROM accommodation WHERE ID=$ID ";
            
            $query_run = mysqli_query($con, $query);
    
            if (mysqli_num_rows($query_run)>= 1) {
                echo '';
                while ($row = mysqli_fetch_assoc($query_run)) {
                
               
    
            


?>		
                <div id="content" class="content p-0">
                    <div class="profile-header">
                        <div class="profile-header-cover"></div>

                        <div class="profile-header-content">
                            <div class="profile-header-img">
                                <img src="../assets/images/logo.png" alt="picture" />
                            </div>

                            <div class="profile-header-info">
                                <h4 class="m-t-sm"><?php echo htmlentities($row['surname']);?>, <?php echo htmlentities($row['fname']);?></h4>
                               <br> <p class="m-b-sm"><?php echo htmlentities($row['university']);?></p>
                                <a href="server.php?approve_landlords=<?php echo htmlentities($row['ID']);?>" class="btn btn-xs btn-primary mb-3">Approve Accomodation Space</a>
                                <a href="server.php?suspend_landlords=<?php echo htmlentities($row['ID']);?>" class="btn btn-xs btn-primary mb-3">Disband/Suspend Accomodation Space</a>
                                <a href="server.php?delete_landlords=<?php echo htmlentities($row['ID']);?>" class="btn btn-xs btn-primary mb-3">Delete Accomodation Space</a>
                            </div>
                        </div>

                        <ul class="profile-header-tab nav nav-tabs">
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">#</a></li>
                            <li class="nav-item"><a href="#" class="nav-link active show" data-toggle="tab">#</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">#</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">#</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">#</a></li>
                        </ul>
                    </div>

                    <div class="profile-container">
                        <div class="row row-space-20">
                            <div class="col-md-8">
                                <div class="tab-content p-0">
                                    <div class="tab-pane active show" id="profile-about">
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Accomodation Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Name of Accommodation</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b><?php echo htmlentities($row['accommodation']);?></b>
                                                             </div>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Type of Accommodation</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b><?php echo htmlentities($row['roomtype']);?></b>
                                                          </div>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Closest University</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['university']);?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Room Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Location</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['university']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Buidling Description</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['description']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Rent Price per month</td>
                                                    <td class="value">
                                                    $ <?php echo htmlentities($row['rentprice']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Type of room(s) available:</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['roomtype']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Facilities/Amenities provided:</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['facilities']);?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">CONTACT INFORMATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Landlord's First Name</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['fname']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Landlord's Surname</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['surname']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Email</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['email']);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Phone Number</td>
                                                    <td class="value">
                                                    <?php echo htmlentities($row['telephone']);?>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 hidden-xs hidden-sm">
                                <ul class="profile-info-list">
                                    <li class="title">Payment Details</li>
                                    <li>
                                        <div class="field">Account Name:</div>
                                        <div class="value"><?php echo htmlentities($row['accname']);?></div>
                                    </li>
                                    <li>
                                        <div class="field">Account Number:</div>
                                        <div class="value"><?php echo htmlentities($row['accnum']);?></div>
                                    </li>
                                    
                                   
                                    <li>
                                        <div class="field">Phone No.:</div>
                                        <div class="value">
                                        <?php echo htmlentities($row['telephone']);?>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="field">Date Form was submitted:</div>
                                        <div class="value">
                                            <address class="m-b-0">
                                            <?php echo htmlentities($row['dateCreated']);?>
                                            </address>
                                        </div>
                                    </li>




                                    <div class="mail-attachment">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> attachment of building - </span>
                                            <a href="../assets/images/accommodation/<?php echo htmlentities($row['image']);?>">Download</a>
                                            |
                                            <a href="../assets/images/accommodation/<?php echo htmlentities($row['image']);?>">View image</a>
                                        </p>
                                        <div class="attachment">
                                            <!--<div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="icon">
                                                            <i class="fa fa-file"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            Document_2014.doc
                                                            <br/>
                                                            <small>Added: Jan 11, 2014</small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="image">
                                                            <img alt="image" class="img-fluid" src="../assets/images/logo.png">
                                                        </div>
                                                        <div class="file-name">
                                                            Italy street.jpg
                                                            <br/>
                                                            <small>Added: Jan 6, 2014</small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>-->
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="image">
                                                            <img alt="image" class="img-fluid" src="../assets/images/accommodation/<?php echo htmlentities($row['image']);?>">
                                                        </div>
                                                        <div class="file-name">
                                                        <?php echo htmlentities($row['image']);?>
                                                            <br/>
                                                            <small>Added: <?php echo htmlentities($row['dateCreated']);?></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                </ul>
                            </div>
                        </div>
                    </div>
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
            <!-- footer -->
            <?php include_once 'footer/footer.php';?>
            <!-- end footer -->
        </div>
        <!-- chart -->
        
        <!-- end chart -->
    </div>
    <!-- <script> js php import</script> -->
    <?php include_once 'script/js.php';?>
    <!-- <script>Library</script> -->
    <!-- <script> import</script> -->
	</body>
</html>