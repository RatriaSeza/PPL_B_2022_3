<?php
    require_once("db/db_login2.php");
    $id = $_GET['nim'];

    $query = 'UPDATE irs 
              SET status_irs = "DISETUJUI"
              WHERE NIM="'.$id.'"';
    
    $result = $db->query( $query );
    header('Location: srs7.php');
?>