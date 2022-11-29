<?php
require('../db/db_login.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}

$nim = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KHS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../nav/style_nav.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
    <style>
        .upload-file {
            height: 167px;
            display: flex;
            cursor: pointer;
            margin-bottom: 30px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 5px;
            border: 2px solid #cbd5e1;
        }

        .upload-file i {
            font-size: 50px;
        }

        .upload-file p {
            margin-top: 15px;
            font-size: 16px;
        }

        table tr:nth-child(2n) {background: #F3F4F6;}
    </style>
</head>

<body>
    <div class="container flex">
        <div class="left sticky top-0">
            <div class="user flex card">
                <img class="object-contain " id="avatar" src="../img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        Olivia Rodrigo <br>
                        <span style="font-size: 12px;">24060120130052</span>
                    </p>
                    <p class="status">
                        Mahasiswa Aktif Departemen Informatika Fakultas Sains dan Matematika
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
        <div class="card sky-blue-50 grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh; margin-right:5vw;">
            <div class="card-header mb-2" style="font-size: 30px">
                <p class="text-gray-700 font-extrabold">Data KHS</p>
            </div>
            <div class="card-body grid overflow-x-auto relative shadow-md sm:rounded-lg">
                <table id="khs_mhs" class="w-full text-sm text-left rounded text-gray-800 dark:text-gray-800">
                    <thead class="text-base text-white uppercase bg-violet-500">
                        <tr>
                            <th scope="col" class="py-3 px-6" style="width:10%">Semester</th>
                            <th scope="col" class="py-3 px-6" style="width:15%">SKS Semester</th>
                            <th scope="col" class="py-3 px-6" style="width:15%">IP Semester</th>
                            <th scope="col" class="py-3 px-6">File KHS</th>
                            <th scope="col" class="py-3 px-6" style="width:10%">Status</th>
                            <th scope="col" class="py-3 px-10" style="width:5%">Edit</th>
                        </tr>
                    </thead>
                    <tbody id="data_khs">
                        <?php
                        $semester_count = 1;
                        $query = "SELECT * FROM khs WHERE nim_mhs=$nim ORDER BY semester_mhs";
                        $query_run = mysqli_query($con, $query);
                        while ($mhs = mysqli_fetch_assoc($query_run)) {
                            while ($semester_count < $mhs['semester_mhs']) {
                        ?>
                                <tr class="font-semibold">
                                    <td class="text-base py-4 px-6"><?= $semester_count ?></td>
                                    <td class="text-base py-4 px-6">Empty</td>
                                    <td class="text-base py-4 px-6">Empty</td>
                                    <td class="text-base py-4 px-6 text-cyan-500" id="fileKHS">Empty</td>
                                    <td class="text-2xl text-red-500 px-12"><i class="fa-solid fa-square-xmark"></i></td>
                                    <td class="text-2xl text-amber-300 px-12">
                                        <a href="add_khs.php?semester_count=<?= $semester_count; ?>">
                                            <i class="fa-solid fa-upload"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $semester_count++;
                            }
                            ?>
                            <tr class="font-semibold">
                                <td class="text-base py-4 px-6"><?php if (isset($mhs['semester_mhs'])) echo $mhs['semester_mhs']; ?></td>
                                <td class="text-base py-4 px-6"><?php if (isset($mhs['sks_semester'])) echo $mhs['sks_semester']; ?></td>
                                <td class="text-base py-4 px-6"><?php if (isset($mhs['ip_semester'])) echo $mhs['ip_semester']; ?></td>
                                <td class="text-base py-4 px-6 text-cyan-500" id="fileKHS"><?php if (isset($mhs['berkas_khs'])) echo $mhs['berkas_khs']; ?></td>
                                <td class="text-2xl text-green-500 px-12"><i class="fa-solid fa-square-check"></i></td>
                                <td class="text-2xl text-blue-500 px-12">
                                    <a href="edit_khs.php?semester_mhs=<?= $mhs['semester_mhs']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $semester_count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="flex justify-between">
                <div id="keterangan" class="text-xl">
                    <span class="text-base font-semibold text-gray-600">Keterangan:</span><br>
                    <i class="fa-solid fa-square-check text-green-500"></i><span class="text-base font-semibold text-gray-600"> Sudah Upload</span>
                    <br>
                    <i class="fa-solid fa-square-xmark text-red-500"></i><span class="text-base font-semibold text-gray-600"> Belum Upload</span>
                </div>
                <div class="grid mt-2">
                    <a href="add_khs.php" class="justify-self-end">
                        <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">+ Add</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        document.getElementById('KHS').style.opacity = '2';
        document.getElementById('KHS').style.color = '#4ade80';

        var data_khs = document.getElementById('data_khs');
        var table_rows = document.getElementById('khs_mhs').rows.length;
        // for (let i = 1;)
    </script>
</body>

</html>