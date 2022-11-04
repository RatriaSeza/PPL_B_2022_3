<?php
require_once("db/db_login2.php");
require_once("BEDashboardMHS.php");
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
                        Satria Reza Ramadhan <br>
                        <span style="font-size: 12px;">24060120000004</span>
                    </p>
                    <p class="status">
                        Mahasiswa Aktif <br> Departemen Informatika <br> Fakultas Sains dan Matematika
                    </p>
                </div>
            </div>
            <div class="sidenav card">
                <ul id="navlist" class="divide-y divide-gray-500 grid">
                    <li><a id="Dashboard" href="DashboardMahasiswa.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="Profil" href="edit_profil.php"><i class="fas fa-user"></i> Profil</a></li>
                    <li><a id="IRS" href="irs.php"><i class="fas fa-file-lines"></i> Data IRS</a></li>
                    <li><a id="KHS" href="khs.php"><i class="fas fa-file-lines"></i> Data KHS</a></li>
                    <li><a id="PKL" href="pkl.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="skripsi.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="card1">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <div class="flexbox-container">
                                <form action="">
                                    <div class="flexbox-container cont1 mb-20">
                                        <label for=" Status Akademik">
                                            Status Akademik
                                            <div class="py-3 px-6 border-b border-gray-300 mb-8"></div>
                                            <div class="flexbox-container item1">
                                                <div class="flex justify-center">
                                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                                        <div class="p-6 w-36">
                                                            <h5 class="text-gray-900 text-xl font-medium mb-7">Semester</h5>
                                                            <p class="text-gray-700 text-base mb-2">
                                                                7
                                                            </p>
                                                        </div>
                                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center">
                                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                                        <div class="p-6 w-36">
                                                            <h5 class="text-gray-900 text-xl font-medium mb-7 ">Status</h5>
                                                            <p class="text-gray-700 text-base mb-2">
                                                                Aktif
                                                            </p>
                                                        </div>
                                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                        <label for=" Status Akademik">
                                            Prestasi Akademik
                                            <div class="py-3 px-6 border-b border-gray-300 mb-8"></div>
                                            <div class="flexbox-container item1">
                                                <div class="flex justify-center">
                                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                                        <div class="p-6 w-36">
                                                            <h5 class="text-gray-900 text-xl font-medium mb-7">IPk</h5>
                                                            <p class="text-gray-700 text-base mb-2">
                                                                3.76
                                                            </p>
                                                        </div>
                                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center">
                                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                                        <div class="p-6 w-36">
                                                            <h5 class="text-gray-900 text-xl font-medium mb-7 ">SKSk</h5>
                                                            <p class="text-gray-700 text-base mb-2">
                                                                145
                                                            </p>
                                                        </div>
                                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="py-3 px-1 border-b border-gray-300 mb-8">
                                        Entry Akademik
                                    </div>
                                    <div class="flexbox-container cont2">
                                        <a href="irs.php"><button type="button" class=" inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry IRS</button></a>
                                        <a href="khs.php"><button type="button" class=" inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry KHS</button></a>
                                        <a href="pkl.php"><button type="button" class=" inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry Skripsi</button></a>
                                        <a href="skripsi.php"><button type="button" class=" inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry PKL</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('Dashboard').style.opacity = '2';
        document.getElementById('Dashboard').style.color = '#4ade80';
    </script>
</body>

</html>