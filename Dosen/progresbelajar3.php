<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Progres Belajar</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>

    <!-- Styling -->
    <link rel="stylesheet" href="nav/style_nav.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>

<body class="">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ppl";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $pkl17 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='17';";
    $result17 = $conn->query($pkl17);
    $pkl18 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='18';";
    $result18 = $conn->query($pkl18);
    $pkl19 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='19';";
    $result19 = $conn->query($pkl19);
    $pkl20 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='20';";
    $result20 = $conn->query($pkl20);
    

    $count1=mysqli_num_rows($result17);
    $count2=mysqli_num_rows($result18);
    $count3=mysqli_num_rows($result19);
    $count4=mysqli_num_rows($result20);

    $blm17 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='17';";
    $hasil17 = $conn->query($blm17);
    $blm18 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='18';";
    $hasil18 = $conn->query($blm18);
    $blm19 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='19';";
    $hasil19 = $conn->query($blm19);
    $blm20 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='20';";
    $hasil20 = $conn->query($blm20);

    $hitung1=mysqli_num_rows($hasil17);
    $hitung2=mysqli_num_rows($hasil18);
    $hitung3=mysqli_num_rows($hasil19);
    $hitung4=mysqli_num_rows($hasil20);

    $conn->close();
?>

<div class="grid grid-cols-3 gap-1">
    <div class="row-span-3 ">
        <div class="left">
            <div class="user flex card">
                <img id="avatar" src="img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">Olivia Rodrigo</p>
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
                    <li><a id="Profil" href="RekapStatus6.php"><i class="fas fa-user"></i> Detail Data Mahasiswa</a></li>
                    <li><a id="IRS" href="irs.php"><i class="fas fa-file-lines"></i> Generate Verifikasi</a></li>
                    <li><a id="Progres Belajar" href="#"><i class="fas fa-file-lines"></i> Progres Belajar</a></li>
                    <li><a id="PKL" href="pkl.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="skripsi.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="" style="margin-top:70px;">
    <!-- Link 1-->
        <strong >Overview Mahasiswa Informatika</strong>
        <br><br>
        <div class="max-w-sm bg-white rounded-lg border border-purple-200 shadow-md dark:bg-purple-600 dark:border-purple-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Detail Data Mahasiswa</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-100">Mahasiswa PKL, Mahasiswa Skripsi, Mahasiswa Cuti dan Aktif</p>
                <a href="RekapStatus6.php" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-fuchsia-400 dark:hover:bg-cyan-300 dark:focus:ring-gray-50">
                    Show more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <br>
    <!-- Link 2-->
        <div class="max-w-sm bg-white rounded-lg border border-purple-200 shadow-md dark:bg-purple-600 dark:border-purple-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verifikasi Mahasiswa</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-100">IRS, KHS, PKL, dan Skripsi</p><br/>
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-fuchsia-400 dark:hover:bg-cyan-300 dark:focus:ring-gray-50">
                    Show more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <br>
    <!-- Link 3 -->
        <div class="max-w-sm bg-white rounded-lg border border-purple-200 shadow-md dark:bg-purple-600 dark:border-purple-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Progres Belajar Mahasiswa</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-100">IRS, KHS, PKL, dan Skripsi</p><br/>
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-fuchsia-400 dark:hover:bg-cyan-300 dark:focus:ring-gray-50">
                    Show more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <br><br><br>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden" style="padding-left:20px;padding-right:20px">
                <strong>Grafik Mahasiswa Informatika Tiap Angkatan</strong>
                </div>
            </div>
        </div>
        
    </div>
    <div class="" style="margin-top:70px;">
    <strong >Semester Mahasiswa Informatika</strong>
    <br><br>
    <!-- Link semester 1-->
        <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 1</a>
        <br><br>
        
    <!-- Link semester 2-->
        <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 2</a>
        <br><br>

    <!-- Link semester 3-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 3</a>
        <br><br>

    <!-- Link semester 4-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 4</a>
        <br><br>

    <!-- Link semester 5-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 5</a>
        <br><br>

    <!-- Link semester 6-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-300 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 6</a>
        <br><br>

    <!-- Link semester 7-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 7</a>
        <br><br>

    <!-- Link semester 8-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 8</a>
        <br><br>

    <!-- Link semester 9-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 9</a>
        <br><br>

    <!-- Link semester 10-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 10</a>
        <br><br>
    
    <!-- Link semester 11-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 11</a>
        <br><br>

    <!-- Link semester 12-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 12</a>
        <br><br>

    <!-- Link semester 13-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 13</a>
        <br><br>

    <!-- Link semester 14-->
    <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-400 dark:hover:bg-cyan-200 focus:outline-none dark:focus:ring-blue-800">Semester 14</a>
        <br><br>
        

    </div>
    <div class="col-span-2" style="margin-left:5%;margin-right:5%">
    <canvas id="StackedbarChartcanvas" style="width:80%;height:200px"></canvas>
    </div>
        <script>
            var StackedbarChart = {
                labels: [
                    "2017",
                    "2018",
                    "2019",
                    "2020"
                ],
                datasets: [
                    {
                        label: "Mahasiswa Aktif",
                        backgroundColor: "rgba(191, 0, 255, 0.7)",
                        borderColor: "rgba(191, 0, 255, 1)",
                        borderWidth: 1,
                        data: [<?php echo $count1; ?>, <?php echo $count2; ?>, <?php echo $count3; ?>, <?php echo $count4; ?>]
                    },
                    {
                        label: "Mahasiswa Cuti",
                        backgroundColor: "blue",
                        borderColor: "blue",
                        borderWidth: 1,
                        data: [<?php echo $hitung1; ?>, <?php echo $hitung2; ?>, <?php echo $hitung3; ?>, <?php echo $hitung4; ?>]
                    },
                ]
            };

            var StackedbarChartOptions = {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',//this option is used for place legend on the right side of bar chart
                    }
                },
                scales: {
                    x: {
                        stacked: true,// this option is used to make the bars stacked
                    },
                    y: {
                        stacked: true
                    }
                },
                title: {
                    display: true,
                    text: "Chart.js Stacked Bar Chart"
                }
            }

            window.onload = function () {
                var chartData = {
                    type: "bar",
                    data: StackedbarChart,
                    options: StackedbarChartOptions
                }
                new Chart("StackedbarChartcanvas", chartData);
            };

        </script>
        
        <div class="col-span-2 style="margin-left:5%;margin-right:5%">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden" style="padding-left:20px;padding-right:20px">
                <strong>Daftar Mahasiswa Informatika</strong>
                    <br><br>
                    <table class="min-w-full text-center bg-purple-200">
                    <thead class="border-b bg-purple-300 ">
                        <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            NIM
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Nama
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Angkatan
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Status
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            PKL
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Skripsi
                        </th>
                        </tr>
                    </thead class="border-b">
                    <tbody>
                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "ppl";
                    
                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                    $list = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs,mahasiswa.status_mhs, pkl.status_pkl, mahasiswa.angkatan, skripsi.status_skripsi FROM mahasiswa INNER JOIN skripsi INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs AND mahasiswa.NIM = skripsi.nim_mhs;";
                    $lists = $conn->query($list);
                    if ($lists->num_rows > 0) {
                    // output data of each row
                    while($row = $lists->fetch_assoc()) {
                        echo'<tr>';
                        echo'<td>'. $row["NIM"]. '</td>';
                        echo'<td>'. $row["nama_mhs"].'</td>';
                        echo'<td>'. $row["angkatan"].'</td>';
                        echo'<td>'. $row["status_mhs"].'</td>';
                        echo'<td>'. $row["status_pkl"].'</td>';
                        echo'<td>'. $row["status_skripsi"].'</td>';
                        echo'</tr>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
                    </tbody>
                    </table>
                    <br>

    </div>

</div>

<script>
        document.getElementById('Progres Belajar').style.opacity = '2';
        document.getElementById('Progres Belajar').style.color = '#4ade80';
</script>
</body>
</html>