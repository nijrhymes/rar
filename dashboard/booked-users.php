
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
                            <h2>Booked Users</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a>Pages</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <strong>Booked Users</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                        
                            <div class="col-lg-12 animated fadeInRight">
                                <div class="mail-box-header">
                                    <form method="get" action="index.html" class="float-right mail-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="search" placeholder="Search email">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <h2> Booked Users Who needs an accomodation</h2>
                                    <div class="mail-tools tooltip-demo m-t-md">
                                        <div class="btn-group float-right">
                                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                                    </div>
                                </div>
                                <div class="mail-box">
                                    <table class="table table-hover table-mail">
                                        <tbody>


                                        <?php
    include('../include/connection.php');

    $ret=mysqli_query($con,"select * from reservation ORDER by ID desc
    LIMIT 5000");
    while ($row=mysqli_fetch_array($ret)) 
    {
    ?>



                                            <tr class="unread">
                                                <td class="check-mail">
                                                    <input type="checkbox" class="i-checks">
                                                </td>
                                                <td class="mail-ontact"><a href="booked_details.php?ID=<?php echo $row['ID']; ?>"> <?php echo htmlentities($row['surname']);?>, <?php echo htmlentities($row['firstname']);?></a></td>
                                                <td class="mail-subject"><a href="booked_details.php?ID=<?php echo $row['ID']; ?>"><?php echo htmlentities($row['university']);?> </a></td>
                                                <td class=""><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date"><?php echo htmlentities($row['DateCreated']);?></td>
                                            </tr>

                                            <?php } ?>



                                        </tbody>
                                    </table>
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