<?php

require_once('connection.php');

if (isset($_POST['btn-submit'])) {
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