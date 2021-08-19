<?php


 session_start();
 
 // check if error msg exist
 if(isset($_SESSION['errorMSg']))
 {
  
 }
          
 
require_once('include/connection.php');

if (isset($_POST['submit'])) {
    //Sanitize data 
    $firstname =  mysqli_real_escape_string($con, $_POST['firstname']);
    $surname =  mysqli_real_escape_string($con, $_POST['surname']);
    $email =  mysqli_real_escape_string($con, $_POST['email']);
    $telephone =  mysqli_real_escape_string($con, $_POST['telephone']);
    $university =  mysqli_real_escape_string($con, $_POST['university']);
    $accommodation =  mysqli_real_escape_string($con, $_POST['accommodation']);
    $roomtype =  mysqli_real_escape_string($con, $_POST['roomtype']);
    $eta =  mysqli_real_escape_string($con, $_POST['eta']);
    $duration =  mysqli_real_escape_string($con, $_POST['duration']);
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES ['image']['tmp_name'];
    $upload = "assets/images/booked/";
    move_uploaded_file($tmp_image,$upload.$image);

    //Generate account booking reference
    $bookingref = md5(time() . $firstname);

    $sql = "insert into reservation (firstname, surname, email, telephone, university, accommodation, room_type, eta, duration, image, bookingref)
    values ('$firstname', '$surname', '$email', '$telephone', '$university', '$accommodation', '$roomtype', '$eta', '$duration', '$image', '$bookingref')";

    if (mysqli_query($con, $sql)) {
      //  header('location:thankyou.php');
    }

    mysqli_close($con);

    //Send Booking ID
    $to = $email;
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
    <link rel="stylesheet" href="assets/css/final-reservation.css">
    <title>Make A Reservation | Rent-A-Room Africa</title>
    
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

    <div class="reserve-form">
        <h2 style="font-family: 'Raleway', sans-serif; color: #fff; text-align: center;">
            Make Your Reservation!</h2>

        <form method="POST" action="" name="reservation-form"  enctype="multipart/form-data" >
            <label for="firstname">First Name </label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name" required>

            <label for="surname">Surname </label>
            <input type="text" id="surname" name="surname" placeholder="Surname" required>

            <label for="email">E-mail </label>
            <input type="email" id="email" name="email" placeholder="Your e-mail" required>

            <label for="telephone">Telephone </label>
            <input type="tel" id="telephone" name="telephone" placeholder="Phone number.. e.g. +233 ### ### ###"
                required>

            <label for="university"> University </label>
            <input type="text" id="university" name="university" value="<?php echo $_SESSION['university']; ?>" placeholder="Name of University" required>

            <label for="accommodation">Name of Accommodation </label>
            <input type="text" id="accommodation" name="accommodation" value="<?php echo $_SESSION['accommodation']; ?>" placeholder="Name of Accommodation" required>

            <label for="roomtype"> Type of Room</label>
            <select id="roomtype" name="roomtype" required>
                <option value="" selected="selected">--- None ---</option>
                <option value="Hostel">Hostel</option>
                <option value="Single room">Single Room</option>
                <option value="Two-bedroom">Two-bed Room</option>
                <option value="Entire Apartment">Entire Apartment</option>
            </select>

            <label for="eta">Arrival Date </label>
            <input type="text" id="eta" name="eta" placeholder="01/12/2020" required>

            <label for="duration"> Duration of Stay </label>
            <select id="duration" name="duration" required>
                <option value="" selected="selected">--- None ---</option>
                <option value="1 Month">1 Month</option>
                <option value="2 Months">2 Months</option>
                <option value="3 Months">3 Months</option>
                <option value="4 Months">4 Months</option>
                <option value="5 Months">5 Months</option>
                <option value="6 Months">6 Months</option>
                <option value="7 Months">7 Months</option>
                <option value="8 Months">8 Months</option>
                <option value="9 Months">9 Months</option>
                <option value="10 Months">10 Months</option>
                <option value="11 Months">11 Months</option>
                <option value="1 Year">1 Year</option>
                <option value="1 Year +">1 Year +</option>
            </select>

            <div id="ident-sec"
                style="background-color: rgb(54, 54, 70, 0.46); display:block; border-radius: 4px;box-sizing: border-box;">
                <h4 style="color: #fff; font-family: 'Raleway', sans-serif; text-align:center; font-weight:400">Upload
                    Valid ID</h4>
                <input type="file" name="image" required>
            </div> <br>

            <div data-netlify-recaptcha=true></div>

            <button type="submit" value="Submit" class="btn" name="submit">
                <span>Submit</span>
            </button>

            <p style="display: block; margin-block-start: 1em; text-align:center;">
                <span style="font-family: Raleway; font-weight: bold; font-size: 12px; color: #fff;"> *One of our agents
                    will get in touch with you within 48h. </span>
            </p>
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
        </script>
    </div>

    <?php
include_once 'include/footer.php';
?>