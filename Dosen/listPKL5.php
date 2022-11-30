<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>List PKL</title>

        <!-- Tailwind -->
		<script src="https://cdn.tailwindcss.com"></script>

        <!-- Icon -->
        <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>

        <!-- Styling -->


        <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="nav/style_nav.css" />
        
	</head>
	<body>

    <?php

$db_host='localhost';
$db_database='ppl';
$db_username='root';
$db_password='';

// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die ("Could not connect to the database : <br />". $db->connect_error);
}

$pkl17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Sudah' AND mahasiswa.angkatan='17';";
$result = $db->query($pkl17);
$blm17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Belum' AND mahasiswa.angkatan='17';";
$result2 = $db->query($blm17);


if(array_key_exists('button1', $_POST)) {
    button1();
}
else if(array_key_exists('button2', $_POST)) {
    button2();
}
else if(array_key_exists('button3', $_POST)) {
    button3();
}
else if(array_key_exists('button4', $_POST)) {
    button4();
}

function button1() {
    global $result;
    global $result2;
    require_once('db/db_login2.php');
    $pkl17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Sudah' AND mahasiswa.angkatan='17';";
    $result = $db->query($pkl17);
    $blm17 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Belum' AND mahasiswa.angkatan='17';";
    $result2 = $db->query($blm17);
}
function button2() {
    global $result;
    global $result2;
    require_once('db/db_login2.php');
    $pkl18 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Sudah' AND mahasiswa.angkatan='18';";
    $result = $db->query($pkl18);
    $blm18 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Belum' AND mahasiswa.angkatan='18';";
$result2 = $db->query($blm18);
}
function button3() {
    global $result;
    global $result2;
    require_once('db/db_login2.php');
    $pkl19 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Sudah' AND mahasiswa.angkatan='19';";
    $result = $db->query($pkl19);
    $blm19 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Belum' AND mahasiswa.angkatan='19';";
$result2 = $db->query($blm19);
}
function button4() {
    global $result;
    global $result2;
    require_once('db/db_login2.php');
    $pkl20 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Sudah' AND mahasiswa.angkatan='20';";
    $result = $db->query($pkl20);
    $blm20 = "SELECT mahasiswa.NIM, mahasiswa.nama_mhs, pkl.status_pkl, mahasiswa.angkatan, pkl.nilai_pkl FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs WHERE pkl.status_pkl='Belum' AND mahasiswa.angkatan='20';";
$result2 = $db->query($blm20);
}

?>

    <div class="grid grid-cols-3">
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
                    <li><a id="Dashboard" href="dashdepartemen5.php"><i class="fas fa-house"></i> Dashboard</a></li>
                    <li><a id="Profil" href="edit_profil.php"><i class="fas fa-user"></i> Profil</a></li>
                    <li><a id="IRS" href="irs.php"><i class="fas fa-file-lines"></i> Data IRS</a></li>
                    <li><a id="KHS" href="khs.php"><i class="fas fa-file-lines"></i> Data KHS</a></li>
                    <li><a id="PKL" href="pkl.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="skripsi.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="../logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="col-span-2" style="padding-right:50px;padding-top:50px">
            
        <strong>Angkatan:</strong>
                <form method="post" style="padding-top:10px">
                    <input type="submit" name="button1"
                        class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2017" />
                    <input type="submit" name="button2"
                        class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2018" />
                    <input type="submit" name="button3"
                        class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2019" />
                    <input type="submit" name="button4"
                        class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded" value="2020" />
                </form>



<div class="flex flex-col" style="padding-top:25px">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <strong>Daftar Mahasiswa Sudah Lulus PKL</strong>
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









if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo'<tr>';
        echo'<td>'. $row["NIM"]. '</td>';
        echo'<td>'. $row["nama_mhs"].'</td>';
        echo'<td>'. $row["angkatan"].'</td>';
        echo'<td>'. $row["status_pkl"].'</td>';
        echo'<td>'. $row["nilai_pkl"].'</td>';
        echo'</tr>';

    }
  } else {
    echo'<tr>';
    echo'<td> - </td>';
    echo'<td> - </td>';
    echo'<td> - </td>';
    echo'<td> - </td>';
    echo'<td> - </td>';
    echo'</tr>';
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
      <strong>Daftar Mahasiswa Belum PKL</strong>
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
    while($row = $result2->fetch_assoc()) {
        echo'<tr>';
        echo'<td>'. $row["NIM"]. '</td>';
        echo'<td>'. $row["nama_mhs"].'</td>';
        echo'<td>'. $row["angkatan"].'</td>';
        echo'<td>'. $row["status_pkl"].'</td>';
        echo'<td>'. $row["nilai_pkl"].'</td>';
        echo'</tr>';

    }
  } else {
        echo'<tr>';
        echo'<td> - </td>';
        echo'<td> - </td>';
        echo'<td> - </td>';
        echo'<td> - </td>';
        echo'<td> - </td>';
        echo'</tr>';
  }
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div style="margin-top:25px">
<a href="rekappkl5.php" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded">
Rekap
</a>
</div>

        </div>
    </div>
    <script>
        document.getElementById('PKL').style.opacity = '2';
        document.getElementById('PKL').style.color = '#4ade80';
</script>
	</body>
</html>
