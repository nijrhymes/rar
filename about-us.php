<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About | Rent-A-Room Africa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords"
        content="rent, apartment, accommodation, accommodation in ghana, houses, hostels, accommodation in west africa, accommodation in africa">
    <meta name="description"
        content="Rent your student accommodation with Rent-A-Room Africa, A safe and easy student housing platform to find and book rooms and residences for university students.">
    <link rel="stylesheet" href="assets/css/about-us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">

    <!-- favicon declarations -->
    <link rel="icon" type="image/png" sizes="512x512" href="assets/images/favicon_io (3)/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon_io (3)/android-chrome-192x192.png">
    <link rel="icon" sizes="180x180" href="assets/images/favicon_io (3)/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="assets/images/favicon_io (3)/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon_io (3)/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon_io (3)/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        #slideshow {
  margin: 80px auto;
  position: relative;
  width: 240px;
  height: 240px;
  padding: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
}

#slideshow > div {
  position: absolute;
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}
        </style>
</head>

<body oncontextmenu="return false;">
    <!--Menu-->
    <?php
include_once 'include/header.php';
?>

    <!--Header-->
    <div class="about-header">
        <div class="about-text">
            <h1> About Us</h1>
        </div>
    </div>

    <div class="about-section">
        <h2>What is Rent-A-Room Africa?</h2>
        <p>
            Rent-A-Room Africa is an online marketplace that offers a unique service to University students.
            We aim to eliminate the hassle that comes with finding good accommodation as a student and also give
            accommodation providers a platform to connect with prospective tenants and as such we provide both parties
            with the great service they deserve.
        </p>
        <p>
            We believe that nothing in this world can make us come alive like a new experience, that nothing like a
            great adventure provides us with the moments that last forever and that technology can help us shape a world
            without borders.
            We believe that studying in another country is an opportunity to live and learn all of these things and that
            if you want to go, you have to do so. We’re here to help.
        </p>
        <h4>
            Rent-A-Room Africa is an online reservation service that provides students with easy access to dozens of
            accommodations around their universities.
        </h4>
    </div>

    <!--Team-->
    <div class="teambox">
        <h2>Meet The Team</h2>
        <div class="row" >
            <div id="slideshow" class="column">
                <div class="card">
                    <img class="cardImg" src="assets/images/avatar.jpg" alt="Maxwell">
                    <div class="container">
                        <h3>Samson Maxwell</h3>
                        <p class="title"> Co-Founder & CEO </p>
                    </div>
                </div>
            </div>

            <!--team card-->
            <div id="slideshow" class="column">
                <div class="card">
                    <img class="cardImg" src="assets/images/avatar.jpg" alt="Eleanor">
                    <div class="container">
                        <h3>Eleanor Nnodi</h3>
                        <p class="title">Co-Founder & Chief Design Officer</p>
                    </div>
                </div>
            </div>

            <div id="slideshow" class="column">
                <div class="card">
                    <img class="cardImg" src=assets/images/avatar.jpg alt="Collins">
                    <div class="container">
                        <h3>Collins Diri</h3>
                        <p class="title">COO</p>
                    </div>
                </div>
            </div>

            <div id="slideshow" class="column">
                <div class="card">
                    <img class="cardImg" src=assets/images/lari.jpeg alt="Lari">
                    <div class="container">
                        <h3>Lari Emmanuel</h3>
                        <p class="title">CMO</p>
                    </div>
                </div>
            </div>

            

        </div>
    </div>


<script>


$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);
</script>

    <?php
include_once 'include/footer.php';
?>