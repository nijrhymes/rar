<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | Rent-A-Room Africa</title>
    <meta name="Keywords"
        content="rent, apartment, accommodation, accommodation in ghana, houses, hostels, accommodation in west africa, accommodation in africa">
    <meta name="description"
        content="Rent your student accommodation with Rent-A-Room Africa, A safe and easy student housing platform to find and book rooms and residences for university students.">
    <link rel="stylesheet" href="assets/css/contact.css">
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
    <div id="body">
        
    <?php
include_once 'include/header.php';
?>

        <main>
            <section class="contact-main">
                <div class="contact">
                    <p>For inquiries, please contact us at&nbsp;<a
                            href="mailto:admin@rarafrica.com">admin@rarafrica.com</a>.</p>

                    <p>General Ghana media inquiries<br /><a href="mailto:admin@rarafrica.com">admin@renthostels.com</a>
                    </p>
                    <!--p>Accra<br /><a href="mailto:press-anz@renthostels.com">press-anz@renthostels.com</a></p>
                    <p>Kasoa<br /><a href="mailto:press-china@renthostels.com">press-china@renthostels.com</a></p>
                    <p>Kumasi<br /><a href="mailto:press-in@renthostels.com">press-in@renthostels.com</a></p>
                    <p>Tema<br /><a href="mailto:press-jp@renthostels.com">press-jp@renthostels.com</a></p>
                    <p>Weija/Old Barrier<br /><a href="mailto:press-kr@renthostels.com">press-kr@renthostels.com</a></p-->

                    <div class="contactinfo">
                        <p> <span> Tell us how we can help. </span> </p>
                        <p> <span> Depending on the topic you choose, we will assign it to a specialised agent. </span>
                        </p>
                        <p> <span> After carefully analysing your case, we will contact you via email or phone call.
                            </span> </p>
                    </div>
                </div>

                <section class='contact-form'>
                    <form method="POST" data-netlify="true" name="contact-form">

                        <label for="tol">Are you a Tenant or Landlord?</label>
                        <select id="tol" name="tol" required>
                            <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
                            <option value="Tenant">Tenant</option>
                            <option value="Landlord">Landlord</option>
                        </select>

                        <label for="bonb">Do you have a booking with us?</label>
                        <select id="bonb" name="bonb" required>
                            <option value="" data-aura-rendered-by="440:0" selected="selected">--- None ---</option>
                            <option value="Yes" data-aura-rendered-by="442:0">Yes</option>
                            <option value="No" data-aura-rendered-by="444:0">No</option>
                        </select>

                        <label for="tyme">Type of Message</label>
                        <select id="tyme" name="tyme" required>
                            <option value="" data-aura-rendered-by="440:0" selected="selected">--- None ---</option>
                            <option value="Question" data-aura-rendered-by="442:0">Question</option>
                            <option value="Report" data-aura-rendered-by="444:0">Report</option>
                        </select>

                        <label for="destination">Country (Destination or Listing Location)</label>
                        <select id="destination" name="destination" required>
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>

                        <label for="fullname">Your Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Your name.. [Firstname] [Surname]"
                            required>

                        <label for="email">E-mail </label>
                        <input type="email" id="email" name="email" placeholder="Your E-mail.." required>

                        <label for="telephone">Phone (Valid phone number with + symbol, country code and subscriber
                            number)</label>
                        <input type="tel" id="telephone" name="telephone"
                            placeholder="Phone number.. e.g. +233 ### ### ###" required>

                        <label for="message">Message </label>
                        <textarea id="message" name="message"
                            placeholder="Write something.. (Please add any necessary reference numbers such as Booking and/or Listing ID)"
                            style="height:150px" required></textarea>

                        <div data-netlify-recaptcha="true"></div>

                        <button type="submit" class="btn" id="btn-contact" name="btn-contact"> <span>Send message</span>
                        </button>
                    </form>
                </section>
            </section>
        </main>

        <?php
include_once 'include/footer.php';
?>