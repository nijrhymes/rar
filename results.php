<?php
session_start();
error_reporting(0);
include('include/connection.php');


//$find="%{$_POST['hostel']}%";



// if (isset($_GET['hostel'])) {
//     $find = $_GET['hostel'];
//   //  include('include/connection.php');
//     if (!empty($find)) {

//         $query = "SELECT * FROM accommodation WHERE university LIKE '%".mysqli_real_escape_string($con, $find)."%' ";
        
//         var_dump($query);$query_run = mysqli_query($con, $query);

//         if (mysqli_num_rows($query_run)>= 1) {
//             echo 'Best matches: <br>';
//             while ($query_row = mysqli_fetch_assoc($query_run)) {
//                 echo $query_row['accommodation'].'<br>';
//             }

//         } else {
//             echo 'No results found!';
//         }
//     }
// }


?>

<?php 

session_start();

	$accommodation = '';
   $university = '';
				
//	$accommodation = trim($_POST['accommodation']);
  // $university = trim($_POST['university']);
    
 
				
if (isset($_POST['reserved'])) {


		$id = trim($_POST['id']);
		$accommodation = trim($_POST['accommodation']);
		$university = trim($_POST['university']);
				
	
    
	if ($id == "1"){

      $_SESSION['errorMSg'] = 'Error  o';


      $_SESSION['accommodation'] = $accommodation;
      $_SESSION['university'] = $university;
      
      
      header('location:final-reservation.php');

	 
exit();
      
		}
}
    
 ?>
 
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">

    <title> Homes for Rent | Rent-A-Room Africa </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords"
        content="rent, apartment, accommodation, accommodation in ghana, houses, hostels, accommodation in west africa, accommodation in africa">
    <meta name="description"
        content="Rent your student accommodation with Rent-A-Room Africa, A safe and easy student housing platform to find and book rooms and residences for university/college students.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/results.css">

    <!-- favicon declarations -->
    <link rel="icon" type="image/png" sizes="512x512"
        href="/renthostelassets/images/favicon_io (3)/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="/renthostelassets/images/favicon_io (3)/android-chrome-192x192.png">
    <link rel="icon" sizes="180x180" href="/renthostelassets/images/favicon_io (3)/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/renthostelassets/images/favicon_io (3)/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/renthostelassets/images/favicon_io (3)/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/renthostel/assets/images/favicon_io (3)/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


</head>

<body oncontextmenu="return false;" style="background-color: black;">
    <div>
    <?php
include_once 'include/header.php';
?>


        <main style="background-color: #fafafa;">
            <div class="content-container">
                <div class="filtersTab">
                    <aside class="filtersMain">
                        <h2 style="font-weight: 400;font-size: 1.25rem;margin-bottom: 24px; margin-top:0px">Find a Home
                        </h2>
                        <ul>
                            <li>
                                <h2 class="filterLabel" style="font-weight: 400; font-size:14px; margin-bottom:0px">
                                    City or University </h2>
                              <!--  <div class="searchinput">
                                    <input type="text" name="" id="" placeholder="Search here...">
                                </div>-->
                            </li>
<br>
                            <li>
                                <h2 style="font-weight: 400; font-size:14px; margin-bottom:0px"> Type of place </h2>
                                <div class="rt-checkbox">
                                    <label class="container">Hostel
                                        <input type="checkbox" name="roomtype[]" value="Hostel">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">Single room
                                        <input type="checkbox" name="roomtype[]" value="Single room">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">Two bedroom
                                        <input type="checkbox" name="roomtype[]" value="Two bedroom">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">Entire Apartment
                                        <input type="checkbox" name="roomtype[]" value="Entire Apartment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>

                            <hr style="color: #ccc;">

                            <li>
                                <h2
                                    style="font-weight: 400; font-size:14px; margin-bottom:0px; padding-top:10px; padding-bottom:15px">
                                    Rent Price </h2>
                                <div class="rentprice">
                                    <input type="text" name="" id="" placeholder="Search here...">
                                </div>
                            </li>
                        </ul>

                        <button type="submit" value="">Apply Filters</button>

                    </aside>
                </div>
                <div class="resultsContainer">
                    <div class="resultsHeader">
                        <div class="sort">
                            <div class="sortLabel"> <!--Best matches --></div>
                        </div>
                    </div>
                    <div class="offerResults">
                       
    
			<?php

// include('include/connection.php');
//  $ret = "SELECT * FROM accommodation WHERE university LIKE '%".mysqli_real_escape_string($con, $find)."%' ";
// $num=mysqli_num_rows($ret);
// if($num>0)
// {
// while ($row=mysqli_fetch_array($ret)) 
// {
    
    
    if (isset($_GET['hostel'])) {
            $find = $_GET['hostel'];
          //  include('include/connection.php');
            if (!empty($find)) {
        
                $query = "SELECT * FROM accommodation WHERE university LIKE '%".mysqli_real_escape_string($con, $find)."%' AND status='Approved' ";
                
                //var_dump($query);
                $query_run = mysqli_query($con, $query);
        
                if (mysqli_num_rows($query_run)>= 1) {
                    echo 'Best matches: <br>';
                    while ($row = mysqli_fetch_assoc($query_run)) {
                      //  echo $row['accommodation'].'<br>';
                   
        
                
    
    
    ?>			

                
      




                    
                    
                    
                        <div style="" class="card">
                            <div class="card-img">
                                <img src="assets/images/accommodation/<?php echo htmlentities($row['image']);?>" class="mySlides fade" width="220" height="200">
                            </div>

                            <div class="card-info">
                                <h2 style="font-weight:500; font-size:18px"><?php echo htmlentities($row['accommodation']);?></h2>
                                <p style="font-size: 1rem;line-height: 1;margin-bottom: 8px;color: #9b9b9b;"><b>Room Type:</b> <?php echo htmlentities($row['roomtype']);?>
                               </p>
                               <p style="font-size: 1rem;line-height: 1;margin-bottom: 8px;color: #9b9b9b;"><b>Facilities:</b> <?php echo htmlentities($row['facilities']);?>
                               </p>
                               <p style="font-size: 1rem;line-height: 1;margin-bottom: 8px;color: #9b9b9b;"><b>Description:</b> <?php echo htmlentities($row['description']);?>
                               </p>
                                <div class="neighbourhood">
                                    <svg width="9" height="11" viewBox="0 0 9 11" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.5 11C3.766 11 0 7.443 0 4.5S2.015 0 4.5 0 9 1.557 9 4.5 5.234 11 4.5 11zm0-4a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"
                                            fill="#0083E4" fill-rule="evenodd"></path>
                                    </svg> <?php echo htmlentities($row['university']);?>
                                </div>
                                <p style="color: grey;font-size: 18px;">$ <?php echo htmlentities($row['rentprice']);?></p>
                                <div class="btm-wrapper">
                                <form method="post" name="spendform" action=''>
                                <input type="hidden" name="university" value="<?php echo htmlentities($row['university']);?>" >
                                <input type="hidden" name="accommodation" value="<?php echo htmlentities($row['accommodation']);?>" >
                                <input type="hidden" name="id" value="1" >

                                  
                                         <span>   <input type="submit" name="reserved" value=" Make a Reservation!"  class="reserve-btn"></span>
                                 </form>
                                    <div class="verified">
                                        <div class="vfd">Verified
                                            <span class="tooltiptext">Rent-A-Room Africa has checked this place, and
                                                confirmed its location and authenticity.</span>
                                        </div>
                                        <div class="tld">Trusted Landlord
                                            <span class="tooltiptext">A trusted landlord has already hosted at least one
                                                tenant through Rent-A-Room Africa.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                        
                    }
                 } else {
        ?>
	
    <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Hostel Found</h3>
    </div>
    
<?php 
                  //  echo 'No results found!';
                }
            }
        } ?>	
    




                    </div>
                </div>
            </div>










        </main>
        
<?php
include_once 'include/footer.php';
?>