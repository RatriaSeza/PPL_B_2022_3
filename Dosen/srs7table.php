<?php
    require_once("db/db_login2.php");

    $query = "SELECT * FROM mahasiswa INNER JOIN irs WHERE mahasiswa.NIM = irs.NIM";

    $result = $db->query( $query );
    $i = 1;
    
    while($row = $result->fetch_object()){
        echo '<tr class="border-b">' ;
        echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">'.$i.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->nama_mhs.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->NIM.'</td>';
        echo '<td class="text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">'.$row->semester_mhs.'</td>';


        if ($row->status_irs != 'DISETUJUI'){
            echo '<td><a class="grid justify-item-center text-center inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out" href="approve.php?nim='. $row->NIM .'">Approve</a></td>';
        }
        else{
            echo '<td><a class="grid justify-item-center text-center inline-block px-7 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" href="reject.php?nim='. $row->NIM .'">Reject</a></td>';
        }
        echo '</tr>';
        $i++;
    }
?>
