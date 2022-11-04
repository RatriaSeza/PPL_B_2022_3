<?php
    require_once('db/db_login.php');

    if (! isset($_GET['email'])) {
        echo false;
    } else {
        $email = test_input($_GET['email']);
        $result = $con->query("SELECT * FROM mahasiswa WHERE email='$email'");

        echo $result->num_rows == 0;
    }
?>
