<?php require_once("../db/db_login2.php"); ?>
<?php
    //require_once("db_login.php");
    $query = "SELECT COUNT(*) FROM mahasiswa";
    $result = $db->query( $query ); // Execute the query

    while($row = mysqli_fetch_array($result)) {
        $rows = $row['COUNT(*)'];
    }
?>
 
<?php
    $query1 = "SELECT COUNT(*) FROM dosen";
    $result1 = $db->query( $query1 ); // Execute the query

    while($row1 = mysqli_fetch_array($result1)) {
        $rows1 = $row1['COUNT(*)'];
    }
?>

<?php
    $query2 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'Aktif'";
    $result2 = $db->query( $query2 ); // Execute the query
    
    while($row2 = mysqli_fetch_array($result2)) {
        $rows2 = $row2['COUNT(*)'];
    }
?>

<?php
    $query3 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'cuti'";
    $result3 = $db->query( $query3 ); // Execute the query
    
    while($row3 = mysqli_fetch_array($result3)) {
        $rows3 = $row3['COUNT(*)'];
    }
?>

<?php
    $query4 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'Mangkir'";
    $result4 = $db->query( $query4 ); // Execute the query
    
    while($row4 = mysqli_fetch_array($result4)) {
        $rows4 = $row4['COUNT(*)'];
    }
?>

<?php
    $query5 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'DO'";
    $result5 = $db->query( $query5 ); // Execute the query
    
    while($row5 = mysqli_fetch_array($result5)) {
        $rows5 = $row5['COUNT(*)'];
    }
?>

<?php
    $query6 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'Undur Diri'";
    $result6 = $db->query( $query6 ); // Execute the query
    
    while($row6 = mysqli_fetch_array($result6)) {
        $rows6 = $row6['COUNT(*)'];
    }
?>

<?php
    $query7 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'Lulus'";
    $result7 = $db->query( $query7 ); // Execute the query
    
    while($row7 = mysqli_fetch_array($result7)) {
        $rows7 = $row7['COUNT(*)'];
    }
?>

<?php
    $query8 = "SELECT COUNT(*) FROM mahasiswa WHERE status_kuliah = 'Meninggal Dunia'";
    $result8 = $db->query( $query8 ); // Execute the query
    
    while($row8 = mysqli_fetch_array($result8)) {
        $rows8 = $row8['COUNT(*)'];
    }
?>
