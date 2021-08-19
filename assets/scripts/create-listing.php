<?php

require_once('connection.php');

if (isset($_POST['btn-submit'])) { 
    $accommodation = mysqli_real_escape_string($con, $_POST['accommodation']);
    $university = mysqli_real_escape_string($con, $_POST['university']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $rentprice = mysqli_real_escape_string($con, $_POST['rentprice']);
    echo $roomtype = $_POST['roomtype'];
    $rt = implode(',', $roomtype);
    echo $facilities = $_POST['facilities'];
    $fac = implode(',', $facilities);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $image_upload = $_FILES['image']['name'];
    $tmp_image = $_FILES ['image']['tmp_name'];
    $upload = "upload/";
    move_uploaded_file($tmp_image,$upload.$image_upload);
    $accname = mysqli_real_escape_string($con, $_POST['accname']);
    $nob = mysqli_real_escape_string($con, $_POST['nob']);
    $accnum = mysqli_real_escape_string($con, $_POST['accnum']);

    $sql = "insert into accommodation (accommodation, university, description, location, rentprice, roomtype, facilities, fname, surname, email, telephone, image, accname, nob, accnum) 
        values ('$accommodation', '$university', '$description', '$location', '$rentprice', '$rt', '$fac', '$fname', '$surname', '$email', '$telephone', '$image_upload', '$accname', '$nob', '$accnum')";

    if (mysqli_query($con, $sql)) {
        header('location:thankyou.php');
    }

    mysqli_close($con);

    //Send Booking ID
    /*$to = $email;
    $subject = "(New Reservation) Booking Details";
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
                <p>First Name: <br>'.$fname'</p>
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

    mail($to, $subject, $message, $headers);*/
}
?>