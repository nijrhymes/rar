<?php

if (isset($_POST['btn-contact'])) {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $tol = $_POST['tol'];
        $bonb = $_POST['bonb'];
        $tyme = $_POST['tyme'];
        $destination = $_POST['destination'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $message = $_POST['message'];

        //Send Booking ID
        $to = $email;
        $subject = $tyme;
        $message = " 
    <html>
        <style>
        body{font-family: Raleway; width: 50%};
        </style>
        <body>
            <h2 style='font-weight: 600; font-size:22px; color: rgb(56, 147, 233)'> RentHostels </h2>
            <p>'Your message has been received! One of our agents will be in touch with you shortly.'</p>
            <p>Contact Reference: <br>'.$contactref'</p>
            <hr>
            <p>Name: <br>'.$fullname'</p>
            <p>Country: <br>'.$country'</p>
            <p>E-mail: <br>'.$email'</p>
            <p>Telephone: <br>'.$telephone'</p>
            <p>Tenant/Landlord: <br>'.$tol'</p>
            <p>Booking/No Booking: <br>'.$bnb'</p>
            <p>tyme: <br>'.$tyme'</p>
            <p>Message: <br>'.$message'</p>
        </body>
    </html>";

        $headers = "From: RentHostels <mxwll.jr@gmail.com>" . "\r\n" .
            "CC: mxwll.jr@mail.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

        $send = mail($to, $subject, $message, $headers);
        if ($send) {
            echo '<br>';
            echo 'Thanks for contacting us. We will get back to you shortly.';
        } else {
            echo 'There was an error';
        }
    }
}

?>