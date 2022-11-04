<?php
require_once("db/db_login2.php");
require_once("BEDashboardOP.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <title>Dashboard Operator</title>
  <link rel="stylesheet" href="css/style2.css">

  <title>PPL</title>
</head>

<body>
  <div class="container nt flex">
    <div class="left sticky top-0">
      <div class="user flex card">
        <img class="object-contain hover:scale-125 " id="avatar" src="img/olix.png" alt="" />
        <div class="flex-row ml-5">
          <p class="username">
            Olivia Rodrigo <br>
            <!-- <span style="font-size: 12px;">24060120130052</span> -->
          </p>
          <p class="status">
            Operator <br> Departemen Informatika <br> Fakultas Sains dan Matematika
          </p>
        </div>
      </div>
      <div class="sidenav card">
        <ul id="navlist" class="divide-y divide-gray-500 grid">
          <li><a id="Dashboard" href="DashboardMahasiswa.php"><i class="fas fa-house"></i> Dashboard</a></li>
          <li><a id="GenAkun" href="GenerateAkunMHS.php"><i class="fas fa-file-lines"></i> Generate Akun</a></li>
          <li><a id="DataMhs" href="#"><i class="fas fa-file-lines"></i> Data Mahasiswa</a></li>
          <li><a id="DataPKL" href="#"><i class="fas fa-building"></i> Data PKL Mahasiswa</a></li>
          <li><a id="Skripsi" href="listskripsi5.php"><i class="fas fa-book-bookmark"></i> Data Skripsi Mahasiswa</a></li>
          <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
        </ul>
      </div>
    </div>
    <!-- <div class="main-content1 card"> -->
    <!-- <div class="card-header">Dashboard</div> -->
    <!-- <div class="card-body"> -->
    <div class="card1 grow">
      <div class="main">
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-3 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full text-center">
                  <thead class="border-b bg-gray-800">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-white px-6 py-4 ">
                        DATA DEPARTEMEN
                      </th>
                    </tr>
                  </thead class="border-b">
                  <tbody>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAHASISWA</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows ?>
                      </td>
                    </tr class="bg-white border-b">
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DOSEN</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows1 ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-20 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full text-center">
                  <thead class="border-b bg-gray-800">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        STATUS MAHASISWA
                      </th>
                    </tr>
                  </thead class="border-b">
                  <tbody>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">AKTIF</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows2 ?>
                      </td>
                    </tr class="bg-white border-b">
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CUTI</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows3 ?>
                      </td>
                    </tr>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MANGKIR</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows4 ?>
                      </td>
                    </tr>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DO</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows5 ?>
                      </td>
                    </tr>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">UNDUR DIRI</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows6 ?>
                      </td>
                    </tr>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">LULUS</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows7 ?>
                      </td>
                    </tr>
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MENINGGAL DUNIA</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <?php echo $rows8 ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <!-- </div> -->
  <!-- </div> -->
  </div>
  <script>
    document.getElementById('Dashboard').style.opacity = '2';
    document.getElementById('Dashboard').style.color = '#4ade80';
  </script>
</body>

</html>