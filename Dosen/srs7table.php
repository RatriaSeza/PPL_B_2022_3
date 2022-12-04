<?php
    require_once("../db/db_login2.php");

    $query = "SELECT * FROM mahasiswa INNER JOIN irs WHERE mahasiswa.NIM = irs.nim_mhs";

    $result = $db->query( $query );
    $i = 1;
    
    while($row = $result->fetch_object()){
        echo '<tr class="border-b">' ;
        echo '<td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">'.$i.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->nama_mhs.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->NIM.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->sem_aktif.'</td>';

        echo '</tr>';
        $i++;
    }
?>
