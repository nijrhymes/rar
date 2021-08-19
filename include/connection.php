<?php

    $con = mysqli_connect('localhost', 'mcodingc_rarafrica', 'passwordforrarafrica', 'mcodingc_rarafrica');

    if(!$con)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

?>