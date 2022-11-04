<?php require_once("db/db_login2.php"); ?>
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
    <link rel="stylesheet" href="css/style2.css">

    <title>PPL</title>
</head>

<body>
    <div class="container nt">
        <div class="left sticky top-0">
            <div class="user flex card">
                <img class="object-contain hover:scale-125 " id="avatar" src="img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        Olivia Rodrigo <br>
                        <!-- <span style="font-size: 12px;">24060120130052</span> -->
                    </p>
                    <p class="status">
                        Dosen <br> Departemen Informatika <br> Fakultas Sains dan Matematika
                    </p>
                </div>
            </div>
            <div class="sidenav card">
                <ul id="navlist" class="divide-y divide-gray-500 grid">
                    <li><a id="Dashboard" href="dashdosen6.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="IRS" href="srs7.php"><i class="fas fa-file-lines"></i> Data IRS</a></li>
                    <li><a id="KHS" href="#"><i class="fas fa-file-lines"></i> Data KHS</a></li>
                    <li><a id="PKL" href="listPKL5.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="listskripsi5.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="main-content1 card"> -->
        <div class="card1">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-left">
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
                                        <th scope="col" class="text-center font-medium text-gray-900 px-6 py-4 text-center">
                                            APPROVAL
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