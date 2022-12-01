<?php
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])){
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_destroy();
    }
    header('Location: login.php');
?>