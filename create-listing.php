
<?php

require_once('include/connection.php');

if (isset($_POST['save'])) {
    $accommodation = mysqli_real_escape_string($con, $_POST['accommodation']);
    $university = mysqli_real_escape_string($con, $_POST['university']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $rentprice = mysqli_real_escape_string($con, $_POST['rentprice']);
  
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
    $target = "assets/images/accommodation/".basename($image);


mysqli_query($con, "INSERT INTO accommodation (accommodation, university, description, rentprice, roomtype, facilities, fname, surname, email, telephone, image) 
VALUES ('$accommodation', '$university', '$description', '$rentprice', '$rt', '$fac', '$fname', '$surname', '$email', '$telephone', '$image')"); 


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    //if (($email)) {
    
        $_SESSION['message'] = "Accommodation have been saved"; 
        header('location: thankyou.php');
    }else{
        $_SESSION['message'] = "Error in image upload"; 
    }



    mysqli_close($con);

    //Send Booking ID
    $to = $email;
    $subject = "(New Listing) Accommodation Details";
    $message = " 
    <html>
        <style>
        body{font-family: Raleway; width: 50%};
        </style>
        <body>
            <h2 style='font-weight: 600; font-size:22px; color: rgb(56, 147, 233)'> RentHostels </h2>
                <p>'You have successfully added your hostel/accommodation with us, order has been received! Please wait 24-48 hrs for confirmation.'</p>
                <p>It will be a pleasure working with you</p>
                <hr>
                <p>First Name: <br>'.$fname'</p>
                <p>Surname: <br>'.$surname'</p>
                <p>E-mail: <br>'.$email'</p>
                <p>Telephone: <br>'.$telephone'</p>
                <p>University: <br>'.$university'</p>
                <p>Accommodation: <br>'.$accommodation'</p>
                <p>Pricing: <br>'.$rentprice'</p>
               
               
              
        </body>
    </html>";

    $headers = "From: mxwll.jr@gmail.com" . "\r\n" .
        "CC: mxwll.jr@mail.com";
    $headers .= "" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Accommodation Upload | Rent-A-Room Africa </title>
    <link rel="stylesheet" href="assets/css/create-listing.css">

    <!-- favicon declarations -->
    <link rel="icon" type="image/png" sizes="512x512" href="assets/images/favicon_io (3)/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon_io (3)/android-chrome-192x192.png">
    <link rel="icon" sizes="180x180" href="assets/images/favicon_io (3)/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="assets/images/favicon_io (3)/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon_io (3)/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon_io (3)/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body oncontextmenu="return false;">
<?php
include_once 'include/header.php';
?>

    <div class="housing-form" id="housing-form">
        <h1 style="font-family: 'Raleway', sans-serif; color: #f0f0f0; text-align: center;">
            Welcome to Rent-A-Room Africa Accommodation Upload Portal</h1>
        <h3 style="color:#f0f0f0; text-align:center;"> Create your listing! </h3>

        <form method="POST" action="" name="create-listing"  enctype="multipart/form-data" >

            <label for="accommodation"> Name of Accommodation </label>
            <p><input type="text" id="accommodation" name="accommodation" placeholder="Name of Accommodation" required>
            </p>

            <label for="accommodationid"> Type of Accommodation</label>
            <p><select id="accommodationid" name="accommodationid" required>
                    <option value="" selected="selected">--- None ---</option>
                    <option value="room">Hostel</option>
                    <option value="room">Apartment</option>
                </select>
            </p>

            <label for="university"> Closest University </label>
            <p><input type="text" name="university" placeholder="Closest University" required></p>

            <label for="location"> Location </label>
            <p><input type="text" name="location" placeholder="Location" required></p>

            <label for="description"> Buidling Description </label>
            <p><input type="text" name="description" placeholder="Describe your building/accommodation" required></p>

            <label for="rentprice"> Rent Price per month </label>
            <p><input type="text" name="rentprice" placeholder="Rent Price per month" required></p>

            <div class="room">
                <label for="room"> Type of room(s) available: </label>
                <div class="room-type" required>
                    <p><input type="checkbox" name="roomtype[]" value="Hostel"> Hostel </p>
                    <p><input type="checkbox" name="roomtype[]" value="Single room"> Single room </p>
                    <p><input type="checkbox" name="roomtype[]" value="Two bedroom"> Two bedroom </p>
                    <p><input type="checkbox" name="roomtype[]" value="Entire Apartment"> Entire Apartment </p>
                </div>
            </div>

            <div class="facilities">
                <label for="facilities"> Facilities/Amenities provided: </label>
                <div class="facilities-list">
                    <div class="facilities-check" required>
                        <p><input type="checkbox" name="facilities[]" value="A/C"> Air Conditioning </p>
                        <p><input type="checkbox" name="facilities[]" value="Fan"> Fan </p>
                        <p><input type="checkbox" name="facilities[]" value="WiFi"> WiFi </p>
                        <p><input type="checkbox" name="facilities[]" value="Bed"> Bed </p>
                    </div>

                    <div class="facilities-check">
                        <p><input type="checkbox" name="facilities[]" value="Kitchen"> Kitchen </p>
                        <p><input type="checkbox" name="facilities[]" value="Canteen/Cafeteria"> Canteen/Cafeteria </p>
                        <p><input type="checkbox" name="facilities[]" value="Furnishings"> Furnishings (Wardrobe, Desk,
                            Chairs) </p>
                        <p><input type="checkbox" name="facilities[]" value="Balcony"> Balcony </p>
                    </div>

                    <div class="facilities-check">
                        <p><input type="checkbox" name="facilities[]" value="TV"> TV </p>
                        <p><input type="checkbox" name="facilities[]" value="Microwave"> Microwave </p>
                        <p><input type="checkbox" name="facilities[]" value="Refridgerator"> Refridgerator </p>
                    </div>
                </div>
            </div>

            <div style="background-color:rgb(54, 54, 70, 0.46)">
                <h4 style="color: #f0f0f0; font-family: 'Raleway', sans-serif; text-align:center">Upload Listing Images
                </h4>
                <input type="file" name="image" required>
            </div>

            <br>
            <hr style="width: 85%; color:#808080">

            <h3 style="color: #f0f0f0; font-size: 18px;"> Landlord Details </h3>

            <label for="fname"> First Name </label>
            <p><input type="text" id="fname" name="fname" placeholder="First Name" required></p>

            <label for="surname"> Surname </label>
            <p><input type="text" name="surname" placeholder="Surname" required></p>

            <label for="email"> Email </label>
            <p><input type="email" id="email" name="email" placeholder="Your e-mail" required></p>

            <label for="phone">Telephone </label>
            <p><input type="tel" id="telephone" name="telephone" placeholder="Phone number.. e.g. +233 ### ### ###"
                    required></p>

            <br>
            <hr style="width: 85%; color:#808080">

            <div data-netlify-recaptcha="true"></div>

            <button type="submit" value="Create listing!" class="btn" id="btn-submit" name="save">
                <span>Create listing</span></button>

        </form>
        <script>
            // Get the input field
            var input = document.getElementById("myInput");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function (event) {
                // Number 13 is the "Enter" key on the keyboard
                if (event.keyCode === 13) {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    document.getElementById("myBtn").click();
                }
            });

            var button = document.getElementById('btn-submit').addEventListener('click', buttonClick);

            function buttonClick() {
                alert('Email submitted successfully!');
            }
        </script>
    </div>

    <?php
include_once 'include/footer.php';
?>