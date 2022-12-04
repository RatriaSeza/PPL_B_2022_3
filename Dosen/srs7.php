<?php require_once("../db/db_login2.php");
session_start();
$nip = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../nav/style_nav.css" />

    <title>PPL</title>
</head>

<body>
    <div class="container nt flex">
        <div class="left sticky top-0">
            <div class="user flex card">
                <?php
                $select = mysqli_query($db, "SELECT * FROM dosen WHERE nip_dosen = '$nip'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                }
                ?>
                <img class="object-contain " id="avatar" src="../img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        <b><?php echo $fetch['nama_dosen']; ?></b><br>
                        <span style="font-size: 12px;"><?php echo $fetch['nip_dosen']; ?></span>
                    </p>
                    <p class="status">
                        Dosen
                        <br>
                        Fakultas Sains dan Matematika
                    </p>
                </div>
            </div>
            <div class="sidenav card">
                <ul id="navlist" class="divide-y divide-gray-500 grid">
                    <li><a id="Dashboard" href="dashdosen6.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="PKL" href="listPKL5.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="listskripsi5.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="../logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="main-content1 card"> -->
        <div class="card1 grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh; margin-right:5vw;">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-center">
                                            NO
                                        </th>
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-left">
                                            NAMA
                                        </th>
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-center">
                                            NIM
                                        </th>
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-left">
                                            SEMESTER
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <form method="POST" action=""> -->
                                    <?php include("srs7table.php") ?>
                                    <!-- </form> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('IRS').style.opacity = '2';
            document.getElementById('IRS').style.color = '#4ade80';
        </script>
</body>

</html>