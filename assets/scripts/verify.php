<?php 

require_once('connection.php');

    if(isset($_GET{'vkey'})) {
        //Process verification
        $vkey = $_GET['vkey'];

        $query = " SELECT Verified,vkey FROM users WHERE Verified = 0 AND vkey = '$vkey'(LIMIT 1)";
        $result = mysqli_query($con,$query);

        if($row=mysqli_fetch_assoc($result)) {
            //Validate the email
            $query = " UPDATE USERS SET Verified = 1 WHERE vkey = '$vkey' LIMIT 1";
            
            if($query){
                echo 'Your account has been verified. You can now login.';
            }
            else
            {
                echo 'Error';
            }
        }
        else
        {
            echo 'This account is invalid or already verified';
        }
    }
    else
    {
        die("Something went wrong");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>