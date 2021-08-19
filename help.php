<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Centre | Rent-A-Room Africa</title>

    <meta name="Keywords"
        content="rent, apartment, accommodation, accommodation in ghana, houses, hostels, accommodation in west africa, accommodation in africa">
    <link rel="stylesheet" href="assets/css/help.css">
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
</head>

<body oncontextmenu="return false;">
<?php
include_once 'include/header.php';
?>
    <main>

        <div class="help-header">
            <div class="help-text">
                <h1> Welcome to our Help Centre</h1>
                <p>Find answers to your questions in the sections below & if you can't find any send us a message and
                    we'll get back to you!</p>
            </div>
        </div>

        <section class="faq-rent">
            <h2>Frequently Asked Questions</h2>
            <p style="color: #9c9c9c;"><span> Everything you need to know to get started </span></p>
            <div class="faq-main">
                <button class="accordion">What do I need to rent with Rent-A-Room Africa?</button>
                <div class="panel">
                    <p>Rent-A-Room Africa has a minimum stay period of 28 days. Since our tenants are looking for
                        furnished apartments, we're only accepting furnished properties at the moment. Your listing
                        should represent what the tenant will find as accurately as possible. Adding more features to
                        your listing will bring you more bookings.</p>
                </div>

                <button class="accordion">How do payments work?</button>
                <div class="panel">
                    <p>To book their place, tenants pay Rent-A-Room Africa the first month of rent. After the tenant
                        moves in, Rent-A-Room Africa then transfers this first payment to the landlord, deducting a
                        commission fee from the total contract value. The remaining payments will be paid by the tenant
                        directly to you.</p>
                </div>

                <button class="accordion">How is the commission calculated?</button>
                <div class="panel">
                    <p>We charge a commission on the total value of each booking contract. For example, with a 6-month
                        contract, we multiply the monthly rent amount by 6. The commission will be charged on the
                        resulting value and will be deducted only once from the first month's rent.</p>
                </div>

                <script>
                    var acc = document.getElementsByClassName("accordion");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                        acc[i].addEventListener("click", function () {
                            this.classList.toggle("active");
                            var panel = this.nextElementSibling;
                            if (panel.style.maxHeight) {
                                panel.style.maxHeight = null;
                            } else {
                                panel.style.maxHeight = panel.scrollHeight + "px";
                            }
                        });
                    }
                </script>
            </div>
        </section>

    </main>

    <?php
include_once 'include/footer.php';
?>