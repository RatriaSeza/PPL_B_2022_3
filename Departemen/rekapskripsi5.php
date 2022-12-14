<?php
session_start();
$user = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekap Skripsi</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>

    <!-- Styling -->

    <link rel="stylesheet" href="../nav/style_nav.css" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    
</head>

<body>
    <div class="grid grid-cols-3">
        <div class="left">
            <div class="user flex card">
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
                $select = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                }
                ?>
                <img class="object-contain " id="avatar" src="../img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        <b><?php echo $fetch['username']; ?></b><br>
                    </p>
                    <p class="status">
                        Departemen Informatika
                        <br>
                        Fakultas Sains dan Matematika
                    </p>
                </div>
            </div>
            <div class="sidenav card">
                <ul id="navlist" class="divide-y divide-gray-500 grid">
                    <li><a id="Dashboard" href="dashdepartemen5.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="PKL" href="listPKL5.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="listskripsi5.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="../logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="col-span-2 card grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh; margin-right:5vw;">
            <?php

            $skripsi17 = "SELECT * FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi = 'Sudah' AND mahasiswa.angkatan='2017';";
            $result17 = $conn->query($skripsi17);
            $skripsi18 = "SELECT * FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi = 'Sudah' AND mahasiswa.angkatan='2018';";
            $result18 = $conn->query($skripsi18);
            $skripsi19 = "SELECT * FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi = 'Sudah' AND mahasiswa.angkatan='2019';";
            $result19 = $conn->query($skripsi19);
            $skripsi20 = "SELECT * FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi = 'Sudah' AND mahasiswa.angkatan='2020';";
            $result20 = $conn->query($skripsi20);


            $count1 = mysqli_num_rows($result17);
            $count2 = mysqli_num_rows($result18);
            $count3 = mysqli_num_rows($result19);
            $count4 = mysqli_num_rows($result20);

            $blm17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2017';";
            $hasil17 = $conn->query($blm17);
            $blm18 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2018';";
            $hasil18 = $conn->query($blm18);
            $blm19 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2019';";
            $hasil19 = $conn->query($blm19);
            $blm20 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2020';";
            $hasil20 = $conn->query($blm20);

            $hitung1 = mysqli_num_rows($hasil17);
            $hitung2 = mysqli_num_rows($hasil18);
            $hitung3 = mysqli_num_rows($hasil19);
            $hitung4 = mysqli_num_rows($hasil20);

            $conn->close();
            ?>

            <div>
                <strong>Rekap Mahasiswa Skripsi</strong>
                <canvas id="StackedbarChartcanvas" style="width:80%;height:200px;margin-top:20px;"></canvas>
            </div>

            <script>
                var StackedbarChart = {
                    labels: [
                        "2017",
                        "2018",
                        "2019",
                        "2020"
                    ],
                    datasets: [{
                            label: "Mahasiswa Lulus Skripsi",
                            backgroundColor: "rgba(191, 0, 255, 0.7)",
                            borderColor: "rgba(191, 0, 255, 1)",
                            borderWidth: 1,
                            data: [<?php echo $count1; ?>, <?php echo $count2; ?>, <?php echo $count3; ?>, <?php echo $count4; ?>]
                        },
                        {
                            label: "Mahasiswa Belum Skripsi",
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
                            position: 'right', //this option is used for place legend on the right side of bar chart
                        }
                    },
                    scales: {
                        x: {
                            stacked: true, // this option is used to make the bars stacked
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

                window.onload = function() {
                    var chartData = {
                        type: "bar",
                        data: StackedbarChart,
                        options: StackedbarChartOptions
                    }
                    new Chart("StackedbarChartcanvas", chartData);
                };
            </script>
            <div style="margin-top:25px">
                <a href="listskripsi5.php" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded">
                    List
                </a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('Skripsi').style.opacity = '2';
        document.getElementById('Skripsi').style.color = '#4ade80';
    </script>
</body>

</html>