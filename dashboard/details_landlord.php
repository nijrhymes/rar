
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
                            <h2>Mailbox</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a>Extra Pages</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <strong>mailbox</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                           
                            <div class="col-lg-12 animated fadeInRight">
                            <div class="mail-box-header">
                                <div class="float-right tooltip-demo">
                                    <a href="mail_compose.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>
                                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                                </div>
                                <h2>
                                    User's Booked Details
                                </h2>
                                <div class="mail-tools tooltip-demo m-t-md">


                                    <h3>
                                        <span class="font-normal">User's Full Name: </span>Maxwell John
                                    </h3>
                                    <h5>
                                        <span class="float-right font-normal">10:15AM 02 FEB 2014</span>
                                        <span class="font-normal">From: </span>alex.smith@corporation.com
                                    </h5>
                                </div>
                            </div>
                                <div class="mail-box">
                                    <div class="mail-body">
                                        <p>
                                            Hello Admin!
                                            <br/>
                                            <br/>
                                            Maxwell John just booked for an accomodation at futo university which the name of the accomodation is Mr Johnsk Hostel  
                                           </p>
                                            <p> Type of Room Maxwell want is one bedroom 
                                            and his/her arrival date to the accomodation is 12 Feb 20201
                                             And the duration of stay will be 1 year 
                                           
                                        
                                            You can contact this user's phone number by clicking the number displayed 
                                            <a href="tel:787942442424" class="text-navy">24368779334</a> 
                                            and email directly . <a href="mailto:nijsn@j.com" class="text-navy">nijnnamdi#hd,.com</a> 
                                        </p>
                                        <p>
                                          
                                    
                                    This message is encrypted to both the user booked and the administrator of the website.
                                    </p>
                                    </div>
                                    <div class="mail-attachment">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> 2 attachments - </span>
                                            <a href="#">Download all</a>
                                            |
                                            <a href="#">View all images</a>
                                        </p>
                                        <div class="attachment">
                                            <div class="file-box">
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
                                            </div>
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="image">
                                                            <img alt="image" class="img-fluid" src="../assets/images/logo.png">
                                                        </div>
                                                        <div class="file-name">
                                                            My feel.png
                                                            <br/>
                                                            <small>Added: Jan 7, 2014</small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    
                                    <div class="mail-body text-right tooltip-demo">
                                        <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-reply"></i> Reply</a>
                                        <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-arrow-right"></i> Forward</a>
                                        <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
                                        <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
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