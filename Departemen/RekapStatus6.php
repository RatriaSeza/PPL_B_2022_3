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
  <title>Rekap Status</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icon -->
  <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>

  <!-- Styling -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../nav/style_nav.css" />

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


</head>

<body>

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

  $pkl17 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='2017';";
  $result17 = $conn->query($pkl17);
  $pkl18 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='2018';";
  $result18 = $conn->query($pkl18);
  $pkl19 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='2019';";
  $result19 = $conn->query($pkl19);
  $pkl20 = "SELECT * FROM mahasiswa WHERE status_mhs='Aktif' AND angkatan='2020';";
  $result20 = $conn->query($pkl20);

  $count1 = mysqli_num_rows($result17);
  $count2 = mysqli_num_rows($result18);
  $count3 = mysqli_num_rows($result19);
  $count4 = mysqli_num_rows($result20);

  $blm17 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='2017';";
  $hasil17 = $conn->query($blm17);
  $blm18 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='2018';";
  $hasil18 = $conn->query($blm18);
  $blm19 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='2019';";
  $hasil19 = $conn->query($blm19);
  $blm20 = "SELECT * FROM mahasiswa WHERE status_mhs='Cuti' AND angkatan='2020';";
  $hasil20 = $conn->query($blm20);

  $hitung1 = mysqli_num_rows($hasil17);
  $hitung2 = mysqli_num_rows($hasil18);
  $hitung3 = mysqli_num_rows($hasil19);
  $hitung4 = mysqli_num_rows($hasil20);
  ?>


  <div class="grid grid-cols-3">
    <div class="row-span-2">
      <div class="left">
        <div class="user flex card">
          <?php
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

    </div>
    <div class="col-span-2 card grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh; margin-right:5vw;">
      <div style="margin-left:5%;margin-right:5%">
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
          datasets: [{
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
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden" style="padding-left:20px;padding-right:20px">
              <strong>Daftar Mahasiswa</strong>
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
                    while ($row = $lists->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td>' . $row["NIM"] . '</td>';
                      echo '<td>' . $row["nama_mhs"] . '</td>';
                      echo '<td>' . $row["angkatan"] . '</td>';
                      echo '<td>' . $row["status_mhs"] . '</td>';
                      echo '<td>' . $row["status_pkl"] . '</td>';
                      echo '<td>' . $row["status_skripsi"] . '</td>';
                      echo '</tr>';
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                </tbody>
              </table>
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