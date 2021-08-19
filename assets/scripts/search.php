<?php

require_once('connection.php');

if (isset($_POST['search_bar'])) {
    $search_bar = $_POST['search_bar'];

    if (!empty($search_bar)) {

        $query = "SELECT * FROM accommodation WHERE university LIKE '%".mysqli_real_escape_string($con, $search_bar)."%' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run)>= 1) {
            echo 'Best matches: <br>';
            while ($query_row = mysqli_fetch_assoc($query_run)) {
                echo $query_row['university'].'<br>';
            }

        } else {
            echo 'No results found!';
        }
    }
}

?>