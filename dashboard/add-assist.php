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
                                <p>Please fill this form and submit to add employee record to the database.</p>
                                <form method="POST" action="server.php" name="bookng-assist"   enctype="multipart/form-data" >

<label for="country">Destination/City</label>
<select class="form-control"  id="country" name="country" required>
    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
    <option value="Ghana">Ghana</option>
    <option value="Nigeria">Nigeria</option>
</select required>

<label for="university">Name of University</label>
<input class="form-control" type="text" id="university" name="university" placeholder="Name of University..." required>

<label for="accommodationid"> Type of Accommodation</label>
<select class="form-control"  id="accommodationid" name="accommodationid" required>
    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
    <option value="Hostel">Hostel</option>
    <option value="Single bedroom">Single bedroom</option>
    <option value="Two bedroom">Two bedroom</option>
    <option value="Entire Apartment">Entire Apartment</option>
</select required>

<label for="eta">Arrival Date</label>
<input class="form-control" type="text" id="eta" name="eta" placeholder="dd/mm/yy" required>

<label for="maxbudget">Maximum Budget</label>
<input class="form-control" type="text" id="maxbudget" name="maxbudget" placeholder="$300" required>

<label for="fname">Name </label>
<input class="form-control" type="text" id="fname" name="fullname" placeholder="Full Name (Firstname Surname)" required>

<label for="gender"> Gender </label>
<select class="form-control"  id="gender" name="gender" required>
    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select required>

<label for="email">E-mail </label>
<input class="form-control" type="text" id="email" name="email" placeholder="Your e-mail..." required>

<label for="phone">Phone </label>
<input class="form-control" type="text" id="tel" name="telephone" placeholder="Phone number..." required>

<label for="pickup"> Do you need a pick-up to your new accommodation?</label>
<select class="form-control"  id="pickup" name="pickup" required>
    <option value="" data-aura-rendered-by="1:156;a">--- None ---</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
</select>

<div data-netlify-recaptcha="true"></div>

<button type="submit" value="Submit" class="btn-primary" id="btn-submit" name="submit">
    <span> Submit </span></button>

<p style="display: block; margin-block-start: 1em; text-align:center;">
    <span
        style="font-family: Lato; font-weight: 300; font-style: normal; font-size: 12px; color: rgb(77, 77, 77);">
        *One of our agents will get in touch with you within 48h. </span>
</p>
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

