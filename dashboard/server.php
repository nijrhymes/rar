<?php
include_once '../include/connection.php';




//////////////////START FOR LANDLORDS/////////////////
    
if (isset($_GET['approve_landlords'])) {
    $approve_landlords = $_GET['approve_landlords'];
     mysqli_query($con, "UPDATE  accommodation SET status='Approved' WHERE ID='$approve_landlords'");
     header('location: landlords.php');
 
}
    
if (isset($_GET['suspend_landlords'])) {
    $suspend_landlords = $_GET['suspend_landlords'];
     mysqli_query($con, "UPDATE  accommodation SET status='Pending' WHERE ID='$suspend_landlords'");
     header('location: landlords.php');
 
}
    
if (isset($_GET['delete_landlords'])) {
    $delete_landlords = $_GET['delete_landlords'];
     mysqli_query($con, "DELETE FROM accommodation WHERE ID='$delete_landlords'");
     header('location: landlords.php');
 
}

    ////////////////// END FOR LANDLORDS///////////////////





 ////////////////// Add Landlords USERS /////////////////////////
 
 //$image= "";

 if (isset($_POST['save'])) {
    $accommodation = mysqli_real_escape_string($con, $_POST['accommodation']);
    $university = mysqli_real_escape_string($con, $_POST['university']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $rentprice = mysqli_real_escape_string($con, $_POST['rentprice']);
    //echo $roomtype = $_POST['roomtype'];
  // $rt = implode(',', $roomtype);
    //echo $facilities = $_POST['facilities'];
   //$fac = implode(',', $facilities);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
   // $image = mysqli_real_escape_string($con, $_POST['yesimage']);

            
   // $roomtype = mysqli_real_escape_string($con, $_POST['roomtype']);
   // $facilities = mysqli_real_escape_string($con, $_POST['facilities']);
  
     $roomtype = $_POST['roomtype'];
     $roomtype = $_POST['roomtype'];
            foreach ($roomtype as $rt){
           //  echo $rt;
            }

            $facilities = $_POST['facilities'];
            foreach ($facilities as $fac){
           //     echo $fac;
            }
   
           

    $image = $_FILES['image']['name'];
    // Get text
    
    // image file directory
    $target = "../assets/images/accommodation/".basename($image);



mysqli_query($con, "INSERT INTO accommodation (accommodation, university, description, rentprice, roomtype, facilities, fname, surname, email, telephone, image) 
VALUES ('$accommodation', '$university', '$description', '$rentprice', '$rt', '$fac', '$fname', '$surname', '$email', '$telephone', '$image')"); 


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    //if (($email)) {
    
        $_SESSION['message'] = "Event have been saved"; 
        header('location: landlords.php');
    }else{
        $_SESSION['message'] = "Error in image upload"; 
    }

    //$_SESSION['message'] = "Book have been saved"; 
    //header('location: index.php');
}



///////////////////////////////////////////////////////////////





///////////////////// Assist Booking //////////////////////////////////

if (isset($_POST['submit'])) { 


    $country = mysqli_real_escape_string($con, $_POST['country']) ;
    $university = mysqli_real_escape_string($con, $_POST['university']) ;
    $accommodationid = mysqli_real_escape_string($con, $_POST['accommodationid']) ;
    $eta = mysqli_real_escape_string($con, $_POST['eta']) ;
    $maxbudget = mysqli_real_escape_string($con, $_POST['maxbudget']) ;
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']) ;
    $gender = mysqli_real_escape_string($con, $_POST['gender']) ;
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $pickup = mysqli_real_escape_string($con, $_POST['pickup']) ;
    
    mysqli_query($con, "INSERT INTO booking_assist (country, university, accommodationid, eta, maxbudget, fullname, gender, email, telephone, pickup) 
        VALUES ('$country', '$university', '$accommodationid', '$eta', '$maxbudget', '$fullname', '$gender', '$email', '$telephone', '$pickup')");

if ($email) {
    //if (($email)) {
    
        $_SESSION['message'] = "Event have been saved"; 
        header('location: assist-booking.php');
    }else{
        $_SESSION['message'] = "Error in image upload"; 
    }
}

?>