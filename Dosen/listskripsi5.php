<?php
session_start();
$nip = $_SESSION['username'];

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
  <title>List Skripsi Mahasiswa</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icon -->
  <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>

  <!-- Styling -->

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../nav/style_nav.css" />



</head>

<body>

  <?php

  $db_host = 'localhost';
  $db_database = 'ppl';
  $db_username = 'root';
  $db_password = '';

  // connect database
  $db = new mysqli($db_host, $db_username, $db_password, $db_database);
  if ($db->connect_errno) {
    die("Could not connect to the database : <br />" . $db->connect_error);
  }

  $pkl17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Sudah' AND mahasiswa.angkatan='2017';";
  $result = $db->query($pkl17);
  $blm17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2017';";
  $result2 = $db->query($blm17);


  if (array_key_exists('button1', $_POST)) {
    button1();
  } else if (array_key_exists('button2', $_POST)) {
    button2();
  } else if (array_key_exists('button3', $_POST)) {
    button3();
  } else if (array_key_exists('button4', $_POST)) {
    button4();
  }

  function button1()
  {
    global $result;
    global $result2;
    require_once('../db/db_login2.php');
    $pkl17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Sudah' AND mahasiswa.angkatan='2017';";
    $result = $db->query($pkl17);
    $blm17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2017';";
    $result2 = $db->query($blm17);
  }
  function button2()
  {
    global $result;
    global $result2;
    require_once('../db/db_login2.php');
    $pkl18 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Sudah' AND mahasiswa.angkatan='2018';";
    $result = $db->query($pkl18);
    $blm18 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2018';";
    $result2 = $db->query($blm18);
  }
  function button3()
  {
    global $result;
    global $result2;
    require_once('../db/db_login2.php');
    $pkl19 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Sudah' AND mahasiswa.angkatan='2019';";
    $result = $db->query($pkl19);
    $blm19 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2019';";
    $result2 = $db->query($blm19);
  }
  function button4()
  {
    global $result;
    global $result2;
    require_once('../db/db_login2.php');
    $pkl20 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Sudah' AND mahasiswa.angkatan='2020';";
    $result = $db->query($pkl20);
    $blm20 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, skripsi.status_skripsi, mahasiswa.angkatan, skripsi.nilai_skripsi FROM mahasiswa INNER JOIN skripsi ON mahasiswa.NIM = skripsi.nim_mhs WHERE skripsi.status_skripsi='Belum' AND mahasiswa.angkatan='2020';";
    $result2 = $db->query($blm20);
  }

  ?>

  <div class="grid grid-cols-3">
    <div class="left">
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
    <div class="col-span-2" style="padding-right:50px;padding-top:50px">

      <strong>Angkatan:</strong>
      <form method="post" style="padding-top:10px">
        <input type="submit" name="button1" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2017" />
        <input type="submit" name="button2" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2018" />
        <input type="submit" name="button3" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2019" />
        <input type="submit" name="button4" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2020" />

      </form>



      <div class="flex flex-col" style="padding-top:25px">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <strong>Daftar Mahasiswa Sudah Lulus Skripsi</strong>
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
                      Status Skripsi
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Nilai
                    </th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  <?php









                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td>' . $row["NIM"] . '</td>';
                      echo '<td>' . $row["nama_mhs"] . '</td>';
                      echo '<td>' . $row["angkatan"] . '</td>';
                      echo '<td>' . $row["status_skripsi"] . '</td>';
                      echo '<td>' . $row["nilai_skripsi"] . '</td>';
                      echo '</tr>';
                    }
                  } else {
                    echo '<tr>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <strong>Daftar Mahasiswa Belum Skripsi</strong>
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
                      Status PKL
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Nilai
                    </th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  <?php









                  if ($result2->num_rows > 0) {
                    // output data of each row
                    while ($row = $result2->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td>' . $row["NIM"] . '</td>';
                      echo '<td>' . $row["nama_mhs"] . '</td>';
                      echo '<td>' . $row["angkatan"] . '</td>';
                      echo '<td>' . $row["status_skripsi"] . '</td>';
                      echo '<td>' . $row["nilai_skripsi"] . '</td>';
                      echo '</tr>';
                    }
                  } else {
                    echo '<tr>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '<td> - </td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div style="margin-top:25px">
        <a href="rekapskripsi5.php" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded">
          Rekap
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