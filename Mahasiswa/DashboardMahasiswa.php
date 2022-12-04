<?php
include('../db/db_login.php');
session_start();
$nim = $_SESSION['username'];

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

    <title>Dashboard</title>
</head>

<body>
    <div class="container flex">
        <div class="left sticky top-0">
            <div class="user flex card">
                <?php
                $select = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                }
                ?>
                <img class="object-contain " id="avatar" src="../img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        <b><?php echo $fetch['nama']; ?></b><br>
                        <span style="font-size: 12px;"><?php echo $fetch['nim']; ?></span>
                    </p>
                    <p class="status">
                        Mahasiswa <?php echo $fetch['status_kuliah']; ?> Departemen Informatika Fakultas Sains dan Matematika
                    </p>
                </div>
            </div>
            <div class="sidenav card">
                <ul id="navlist" class="divide-y divide-gray-500 grid">
                    <li><a id="Dashboard" href="DashboardMahasiswa.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="Profil" href="edit_profil.php"><i class="fas fa-user"></i> Profil</a></li>
                    <li><a id="IRS" href="Data_IRS_mhs.php"><i class="fas fa-file-lines"></i> Data IRS</a></li>
                    <li><a id="KHS" href="Data_KHS_mhs.php"><i class="fas fa-file-lines"></i> Data KHS</a></li>
                    <li><a id="PKL" href="pkl.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="skripsi.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="../logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>

        <div class="content-edit-profil card sky-blue-50 grow" style="padding: 1px 1px; margin-top: 10vh; margin-bottom:10vh;">
            <div class="card-header mb-2" style="font-size: 30px; font-weight: 700;"></div>
            <div class="card-body mr-5">
                <form action="">
                    <div class="flexbox-container cont1 mb-200 mt-5 ml-5">
                        <label for=" Status Akademik">Status Akademik
                            <div class="py-3 px-6 border-b border-gray-300 mb-8"></div>
                            <div class="flexbox-container item1">
                                <div class="flex justify-center">
                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                        <div class="p-6 w-36">
                                            <h5 class="text-gray-900 text-xl font-medium mb-7">Semester</h5>
                                            <?php
                                            $select = mysqli_query($con, "SELECT * FROM irs WHERE nim_mhs = '$nim'") or die('query failed');
                                            if (mysqli_num_rows($select) > 0) {
                                                $fetch = mysqli_fetch_assoc($select);
                                            }
                                            ?>
                                            <p class="text-gray-700 text-base mb-2">
                                                <?php echo $fetch['semester_mhs']; ?>
                                            </p>
                                        </div>
                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600"></div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                        <div class="p-6 w-36">
                                            <h5 class="text-gray-900 text-xl font-medium mb-7 ">Status</h5>
                                            <?php
                                            $select = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'") or die('query failed');
                                            if (mysqli_num_rows($select) > 0) {
                                                $fetch = mysqli_fetch_assoc($select);
                                            }
                                            ?>
                                            <p class="text-gray-700 text-base mb-2">
                                                <?php echo $fetch['status_kuliah']; ?>
                                            </p>
                                        </div>
                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600"></div>
                                    </div>
                                </div>
                            </div>
                        </label>
                        <label for=" Status Akademik">Prestasi Akademik
                            <div class="py-3 px-6 border-b border-gray-300 mb-8"></div>
                            <div class="flexbox-container item1">
                                <div class="flex justify-center">
                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                        <div class="p-6 w-36">
                                            <h5 class="text-gray-900 text-xl font-medium mb-7">IPk</h5>
                                            <?php
                                            $query = "SELECT AVG(ip_semester) FROM khs WHERE nim_mhs=$nim";
                                            $query_run = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                echo round($row['AVG(ip_semester)'], 2);
                                            }
                                            ?>
                                            <p class="text-gray-700 text-base mb-2">
                                        </div>
                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600"></div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                                        <div class="p-6 w-36">
                                            <h5 class="text-gray-900 text-xl font-medium mb-7">SKSk</h5>
                                            <?php
                                            $select = mysqli_query($con, "SELECT * FROM khs WHERE nim_mhs = '$nim'") or die('query failed');
                                            if (mysqli_num_rows($select) > 0) {
                                                $fetch = mysqli_fetch_assoc($select);
                                            }
                                            ?>
                                            <p class="text-gray-700 text-base mb-2">
                                                <?php echo $fetch['sks_semester']; ?>
                                            </p>
                                        </div>
                                        <div class="py-3 px-6 border-t border-gray-300 text-gray-600"></div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="py-2 px-1 border-b border-gray-300 mb-8 mt-5 ml-5">Entry Akademik</div>
                    <div class="flexbox-container cont2 ml-5">
                        <a href="add_irs.php"><button type="button" class="inline-block px-1 py-10 bg-indigo-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry IRS</button></a>
                        <a href="add_khs.php"><button type="button" class="inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry KHS</button></a>
                        <a href="skripsi.php"><button type="button" class="inline px-10 py-10 bg-indigo-600 text-white font-medium text-sm mb-2 leading-5 text-center uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry Skripsi</button></a>
                        <a href="pkl.php"><button type="button" class="inline-block px-10 py-10 bg-indigo-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-40 pb-14">Entry PKL</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('Dashboard').style.opacity = '2';
        document.getElementById('Dashboard').style.color = '#4ade80';
    </script>
</body>

</html>