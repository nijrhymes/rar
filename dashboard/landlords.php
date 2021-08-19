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
                        <h2>Landlords</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Land Lords</strong>
                            </li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">

              
                    <?php
                        include('../include/connection.php');

                        $ret=mysqli_query($con,"select * from accommodation ORDER by ID desc
                        LIMIT 5000");
                        while ($row=mysqli_fetch_array($ret)) 
                        {
                        ?>

                        <div class="col-lg-4">
                            <div class="contact-box">
                                <a class="row" href="detail-landlords.php?ID=<?php echo htmlentities($row['ID']);?>">
                                    <div class="col-4">
                                        <div class="text-center">
                                        <?php echo htmlentities($row['status']);?><br>
                                            <img alt="image" class="rounded-circle m-t-xs img-fluid" src="../assets/images/accommodation/<?php echo htmlentities($row['image']);?>">
                                            <div class="m-t-xs font-bold">$ <?php echo htmlentities($row['rentprice']);?></div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h3><strong><?php echo htmlentities($row['surname']);?>, <?php echo htmlentities($row['fname']);?></strong></h3>
                                        <p><i class="fa fa-map-marker"></i><?php echo htmlentities($row['university']);?></p>
                                        <address>
                                            <strong><?php echo htmlentities($row['accommodation']);?></strong><br>
                                            <?php echo htmlentities($row['description']);?>
                                            <abbr title="Phone">P:</abbr> <?php echo htmlentities($row['telephone']);?>
                                        </address>
                                    </div>
                                </a>
                            </div>
                        </div>
                       
                        <?php } ?>


                       
                   
                    </div>
                </div>
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