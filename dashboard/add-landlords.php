<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name     = $position     = $office     = $age     = $start_date     = $salary     = "";
$name_err = $position_err = $office_err = $age_err = $start_date_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name))
    {
        $name_err = "Please enter a name.";
    }
    elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $name_err = "Please enter a valid name.";
    }
    else
    {
        $name = $input_name;
    }

    // Validate position
    $input_position = trim($_POST["position"]);
    if(empty($input_position))
    {
        $position_err = "Please enter a position.";
    }
    elseif(!($input_position))
    {
        $position_err = "Please enter a valid position.";
    }
    else
    {
        $position = $input_position;
    }

    // Validate office
    $input_office = trim($_POST["office"]);
    if(empty($input_office))
    {
        $office_err = "Please enter a office.";
    }
    elseif(!($input_office))
    {
        $office_err = "Please enter a valid office.";
    }
    else
    {
        $office = $input_office;
    }

    // Validate age
    $input_age = trim($_POST["age"]);
    if(empty($input_age))
    {
        $age_err = "Please enter the age.";     
    } 
    elseif(!($input_age))
    {
        $age_err = "Please enter a positive integer value.";
    }
    else
    {
        $age = $input_age;
    }

    // Validate date
    $input_start_date = trim($_POST["start_date"]);
    if(empty($input_start_date))
    {
        $start_date_err = "Please enter the start date.";     
    } 
    elseif(!($input_start_date))
    {
        $start_date_err = "Please enter a positive integer value.";
    }
    else
    {
        $start_date = $input_start_date;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary))
    {
        $salary_err = "Please enter the salary amount.";     
    } 
    elseif(!ctype_digit($input_salary))
    {
        $salary_err = "Please enter a positive integer value.";
    }
    else
    {
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($position_err) && empty($office_err) && empty($age_err) && empty($start_date_err) && empty($salary_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, position, office, age, start_date, salary) VALUES (?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $position, $office, $age, $start_date, $salary);
            
            // Set parameters
            $name       = $name;
            $position   = $position;
            $office     = $office;
            $age        = $age;
            $start_date = $start_date;
            $salary     = $salary;
            $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: form.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close conection_db
    mysqli_close($conection_db);
}
?>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Dashboard</title>
<!-- style css php -->
<?php include_once 'css_style/style.php';?>
<!-- add style css -->
<!-- end style css php -->
	<body>
    <style>
        .help-block{
            color:red;
        }
    </style>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_form.php';?>
            <?php //include_once 'sidebar/nav_dashboard.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
                    <div class="signup-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h2>Create Record</h2>
                                </div>
                                <p>Please fill this form and submit to add Landlord or An Accomodation record to the database.</p>
                                <form method="POST" action="server.php" name="create-listing" enctype="multipart/form-data" >

<label for="accommodation" class=""> Name of Accommodation </label>
<p><input class="form-control" type="text" id="accommodation" name="accommodation" placeholder="Name of Accommodation" required>
</p>

<label for="accommodationid"> Type of Accommodation</label>
<p><select id="accommodationid" name="accommodationid" required>
        <option value="" selected="selected">--- None ---</option>
        <option value="room">Hostel</option>
        <option value="room">Apartment</option>
    </select>
</p>

<label for="university"> Closest University </label>
<p><input class="form-control" type="text" name="university" placeholder="Closest University" required></p>

<label for="location"> Location </label>
<p><input class="form-control" type="text" name="location" placeholder="Location" required></p>

<label for="description"> Buidling Description </label>
<p><input class="form-control" type="text" name="description" placeholder="Describe your building/accommodation" required></p>

<label for="rentprice"> Rent Price per month </label>
<p><input class="form-control" type="text" name="rentprice" placeholder="Rent Price per month" required></p>

<div class="room">
    <label for="room"> <h2>Type of room(s) available: </h2></label>
    <div class="room-type" required>
        <p><input class="form-control" type="checkbox" name="roomtype[]" value="Hostel"> Hostel </p>
        <p><input class="form-control" type="checkbox" name="roomtype[]" value="Single room"> Single room </p>
        <p><input class="form-control" type="checkbox" name="roomtype[]" value="Two bedroom"> Two bedroom </p>
        <p><input class="form-control" type="checkbox" name="roomtype[]" value="Entire Apartment"> Entire Apartment </p>
    </div>
</div>

<div class="facilities">
    <label for="facilities"><h2> Facilities/Amenities provided: </h2></label>
    <div class="facilities-list">
        <div class="facilities-check" required>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="A/C"> Air Conditioning </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Fan"> Fan </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="WiFi"> WiFi </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Bed"> Bed </p>
        </div>

        <div class="facilities-check">
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Kitchen"> Kitchen </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Canteen/Cafeteria"> Canteen/Cafeteria </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Furnishings"> Furnishings (Wardrobe, Desk,
                Chairs) </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Balcony"> Balcony </p>
        </div>

        <div class="facilities-check">
            <p><input class="form-control" type="checkbox" name="facilities[]" value="TV"> TV </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Microwave"> Microwave </p>
            <p><input class="form-control" type="checkbox" name="facilities[]" value="Refridgerator"> Refridgerator </p>
        </div>
    </div>
</div>

<div style="background-color:rgb(54, 54, 70, 0.46)">
    <h4 style="color: #f0f0f0; font-family: 'Raleway', sans-serif; text-align:center">Upload Listing Images
    </h4>
    <input class="form-control" type="file"  id="image" name="image" required>
</div>

<br>
<hr style="width: 85%; color:#808080">

<h3 style="color: black; font-size: 18px;"> Landlord Details </h3>

<label for="fname"> First Name </label>
<p><input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" required></p>

<label for="surname"> Surname </label>
<p><input class="form-control" type="text" name="surname" placeholder="Surname" required></p>

<label for="email"> Email </label>
<p><input class="form-control" type="email" id="email" name="email" placeholder="Your e-mail" required></p>

<label for="phone">Telephone </label>
<p><input class="form-control" type="tel" id="telephone" name="telephone" placeholder="Phone number.. e.g. +233 ### ### ###"
        required></p>

<br>
<hr style="width: 85%; color:#808080">

<div data-netlify-recaptcha="true"></div>

<button type="submit" value="Create listing!" class="btn-primary" id="btn-submit" name="save">
    <span>Create Listing</span></button>

</form> <br><br>
                            </div>
                        </div>   <!-- footer -->   
                        <?php include_once 'footer/footer.php';?>   
                        <!-- end footer -->    
                    </div>
                            
                </div>
            </div>
           
			</div>
            
            <?php include_once 'script/js.php';?>
		</div>
	</body>
</html>

