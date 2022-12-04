<?php
include('../db/db_login.php');
session_start();
$NIM = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../nav/style_nav.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container flex">
        <div class="left sticky top-0">
            <div class="user flex card">
                <?php
                $select = mysqli_query($con, "SELECT * FROM mahasiswa WHERE NIM = '$NIM'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                }
                ?>
                <img class="object-contain " id="avatar" src="../img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">
                        <b><?php echo $fetch['nama_mhs']; ?></b><br>
                        <span style="font-size: 12px;"><?php echo $fetch['NIM']; ?></span>
                    </p>
                    <p class="status">
                        Mahasiswa <?php echo $fetch['status_mhs']; ?> Departemen Informatika Fakultas Sains dan Matematika
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
        <script>
            document.getElementById('Profil').style.opacity = '2';
            document.getElementById('Profil').style.color = '#4ade80';
        </script>
        <div class="content-edit-profil card sky-blue-50 grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh;">
            <div class="card-header mb-2" style="font-size: 30px; font-weight: 700;">Edit Profil</div>
            <div class="card-body">
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama_mhs'];
                    $angkatan = $_POST['angkatan'];
                    $status_mhs = $_POST['status_mhs'];
                    $jalur_masuk = $_POST['jalur_masuk'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $alamat = $_POST['alamat'];
                    $provinsi = $_POST['provinsi'];
                    $kabupaten = $_POST['kabupaten'];
                    $email = $_POST['email'];
                    $nohp = $_POST['nohp'];

                    $query = "UPDATE mahasiswa SET nama_mhs='$nama', angkatan='$angkatan', status_mhs='$status_mhs', jalur_masuk='$jalur_masuk',
                    jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_provinsi='$provinsi', id_kabupaten='$kabupaten', email='$email', nohp='$nohp' 
                    WHERE NIM='$NIM'";

                    $result = mysqli_query($con, $query);

                    if ($result) :
                ?>
                        <div class="text-white text-center text-xl font-semibold shadow-inner rounded p-3 bg-green-500 mb-4">Data berhasil disimpan</div>
                    <?php else : ?>
                        <div class="alert alert-error">Data gagal disimpan <?php echo $con->error ?></div>
                        }
                <?php
                    endif;
                }
                ?>
                <form method="POST" onsubmit="return submitForm()" name="form" class="grid">
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="nama_mhs">Nama Lengkap</label>
                        <input name="nama_mhs" id="nama_mhs" type="text" class="appearance-none block w-full bg-gray-200 text-gray-500 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $fetch['nama_mhs']; ?>" readonly>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="NIM">NIM</label>
                        <input name="NIM" id="NIM" type="text" class="appearance-none block w-full bg-gray-200 text-gray-500 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $fetch['NIM']; ?>" readonly>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-sm font-bold mb-2" for="angkatan">Angkatan</label>
                        <input name="angkatan" id="angkatan" type="text" class="appearance-none block w-full bg-gray-200 text-gray-500 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $fetch['angkatan']; ?>" readonly>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-sm font-bold mb-2" for="status_mhs">Status</label>
                        <input name="status_mhs" id="status_mhs" type="text" class="appearance-none block w-full bg-gray-200 text-gray-500 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $fetch['status_mhs']; ?>" readonly>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-sm font-bold mb-2" for="jalur_masuk">Jalur Masuk</label>
                        <input name="jalur_masuk" id="jalur_masuk" type="text" class="appearance-none block w-full bg-gray-200 text-gray-500 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $fetch['jalur_masuk']; ?>" readonly>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check mt-2">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                            <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                            <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="alamat">Alamat</label>
                        <input name="alamat" id="alamat" value="<?php echo $fetch['alamat']; ?>" type="text-area" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Masukkan Alamat" required>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-sm font-bold mb-2" for="provinsi">Provinsi</label>
                        <div class="relative">
                            <select name="provinsi" id="provinsi" class="form-control block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <option value="<?php if (isset($provinsi)) {
                                                    echo $provinsi;
                                                } ?>">Pilih Provinsi</option>
                                <?php
                                $result = $con->query("SELECT * FROM provinsi ORDER BY nama");

                                while ($data = $result->fetch_object()) :
                                ?>
                                    <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
                                <?php endwhile ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-sm font-bold mb-2" for="kabupaten">Kabupaten/Kota</label>
                        <div class="relative">
                            <select name="kabupaten" id="kabupaten" class="form-control block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <option value="<?php if (isset($kabupaten)) {
                                                    echo $kabupaten;
                                                } ?>">Pilih Kabupaten/Kota</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input name="email" id="email" value="<?php echo $fetch['email']; ?>" type="email" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Masukkan Email" required>
                    </div>

                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="nohp">No Handphone</label>
                        <input name="nohp" id="nohp" value="<?php echo $fetch['nohp']; ?>" type="text" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Masukkan No Handphone" required>
                    </div>

                    <div class="justify-self-end">
                        <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" name="submit" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>