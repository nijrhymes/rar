<?php

require_once('include/connection.php');

if (isset($_POST['submit'])) {
    //Sanitize data 
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
    
    $sql = "INSERT INTO booking_assist (country, university, accommodationid, eta, maxbudget, fullname, gender, email, telephone, pickup) 
        VALUES ('$country', '$university', '$accommodationid', '$eta', '$maxbudget', '$fullname', '$gender', '$email', '$telephone', '$pickup')";

    if (mysqli_query($con, $sql)) {
        header('location:thankyou.php');
    }
      
    mysqli_close($con);

    //Send Booking ID
    $to = $email;
    $subject = "Booking Details";
    $message = " 
    <html>
        <style>
        body{font-family: Raleway; width: 50%};
        </style>
        <body>
            <h2 style='font-weight: 600; font-size:22px; color: rgb(56, 147, 233)'> RentHostels </h2>
                <p>'Your booking order has been received! Please wait 24-48 hrs for confirmation.'</p>
                <p>Booking Reference: <br>'.$bookingref'</p>
                <hr>
                <p>First Name: <br>'.$firstname'</p>
                <p>Surname: <br>'.$surname'</p>
                <p>E-mail: <br>'.$email'</p>
                <p>Telephone: <br>'.$telephone'</p>
                <p>University: <br>'.$university'</p>
                <p>Accommodation: <br>'.$accommodation'</p>
                <p>Room Type: <br>'.$roomtype'</p>
                <p>Arrival Date: <br>'.$eta'</p>
                <p>Duration/Length of Stay: <br>'.$duration'</p>
        </body>
    </html>";

    $headers = "From: mxwll.jr@gmail.com" . "\r\n" .
        "CC: mxwll.jr@mail.com";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assisted Booking | Rent-A-Room Africa</title>
    <meta name="Keywords"
        content="rent, apartment, accommodation, accommodation in ghana, houses, hostels, accommodation in west africa, accommodation in africa">
    <meta name="description"
        content="Rent your student accommodation with Rent-A-Room Africa, A safe and easy student housing platform to find and book rooms and residences for university students.">
    <link rel="stylesheet" href="assets/css/booking-assist.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">

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

    <div>
        <div class="fa-img">
            <div class="fa-img-text">
                <h1>We find the right place for you. Quicker than ever, and free of charge.</h1>
                <p>Our agents do the search and quickly find you a home.</p>
            </div>
        </div>
    </div>

    <main>
        <div class="form-field">
            <form method="POST" action="" name="bookng-assist"   enctype="multipart/form-data" >

                <label for="country">Destination/City</label>
                <select id="country" name="country" required>
                    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Nigeria">Nigeria</option>
                </select required>

                <label for="university">Name of University</label>
                <input type="text" id="university" name="university" placeholder="Name of University..." required>

                <label for="accommodationid"> Type of Accommodation</label>
                <select id="accommodationid" name="accommodationid" required>
                    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
                    <option value="Hostel">Hostel</option>
                    <option value="Single bedroom">Single bedroom</option>
                    <option value="Two bedroom">Two bedroom</option>
                    <option value="Entire Apartment">Entire Apartment</option>
                </select required>

                <label for="eta">Arrival Date</label>
                <input type="text" id="eta" name="eta" placeholder="dd/mm/yy" required>

                <label for="maxbudget">Maximum Budget</label>
                <input type="text" id="maxbudget" name="maxbudget" placeholder="$300" required>

                <label for="fname">Name </label>
                <input type="text" id="fname" name="fullname" placeholder="Full Name (Firstname Surname)" required>

                <label for="gender"> Gender </label>
                <select id="gender" name="gender" required>
                    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select required>

                <label for="email">E-mail </label>
                <input type="text" id="email" name="email" placeholder="Your e-mail..." required>

                <label for="phone">Phone </label>
                <input type="text" id="tel" name="telephone" placeholder="Phone number..." required>

                <label for="pickup"> Do you need a pick-up to your new accommodation?</label>
                <select id="pickup" name="pickup" required>
                    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <div data-netlify-recaptcha="true"></div>

                <button type="submit" value="Submit" class="btn" id="btn-submit" name="submit">
                    <span> Submit </span></button>

                <p style="display: block; margin-block-start: 1em; text-align:center;">
                    <span
                        style="font-family: Lato; font-weight: 300; font-style: normal; font-size: 12px; color: rgb(77, 77, 77);">
                        *One of our agents will get in touch with you within 48h. </span>
                </p>
            </form>
        </div>

        <div class="hiw-info">
            <h2 style="text-align: center; font-weight: 500;">How it works</h2>

            <div class="hiw-steps">
                <img src="assets/images/icons/icon-computer.png" alt="" width="81" height="53">
                <div id="hiw-info-text" style="position: relative; left:30px; width:70%">
                    <h2 style="font-weight: 400;"> Find your home </h2>
                    <p> Search for verified accommodation in your city of choice. Our professional photos, video-tours
                        and detailed descriptions give you all the information you need. </p>
                </div>
            </div>

            <hr style="color: gray;" margin="auto" width="90%">

            <div class="hiw-steps">
                <img class="hiw-img" src="assets/images/icons/icon-paper.png" alt="" width="47" height="59">
                <div id="hiw-info-text" style="position: relative; left:30px; width:70%">
                    <h2 style="font-weight: 400;"> Easy to book </h2>
                    <p> Fill the form and submit, our agents would work on it and get back to you shortly </p>
                </div>
            </div>

            <hr style="color: gray;" margin="auto" width="90%">

            <div class="hiw-steps">
                <img src="assets/images/icons/icon-room.png" alt="" width="59" height="61">
                <div id="hiw-info-text" style="position: relative; left:30px; width:70%">
                    <h2 style="font-weight: 400; line-height:1"> Didn’t get what you asked for? </h2>
                    <p> Your place doesn’t match the information in the listing? Report an issue within 24 hours of your
                        move-in. We’ll temporarily freeze your payment, and find a way to help you. </p>
                </div>

            </div>
        </div>
    </main>

    <?php
include_once 'include/footer.php';
?>