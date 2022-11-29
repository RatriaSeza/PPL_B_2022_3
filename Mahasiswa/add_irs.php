<?php
require('../db/db_login.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}

$nim = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $semester = htmlspecialchars($_POST['semester']);
    $sks = htmlspecialchars($_POST['sks']);

    // Scan IRS
    $scanIRS = upload($nim, $semester);

    //Query insert
    $query = "INSERT INTO irs (nim_mhs, semester_mhs, sks, berkas_irs) VALUES ('$nim', '$semester','$sks', '$scanIRS')";
    $query_run = mysqli_query($con, $query);

    if (!$query_run) {
        die("Could not query the database");
    } else {
        mysqli_close($con);
        header('location: Data_IRS_mhs.php');
    }
}

function upload($nim, $semester)
{
    $fileName = $_FILES['scanIRS']['name'];
    $fileTmp = $_FILES['scanIRS']['tmp_name'];

    move_uploaded_file($fileTmp, 'file_irs/' . $nim . '_' . $semester . '_' . $fileName);

    return $fileName;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data IRS</title>
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
                <p class="text-gray-700 font-extrabold  ">Add Data IRS</p>
            </div>
            <div class="card-body">
                <form method="POST" name="fIRS" action="" class="grid dropzone" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <div class="form-group mt-3 mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="">
                            Semester
                        </label>
                        <input name="semester" value="<?php if (isset($_GET['semester_count'])) echo (int)$_GET['semester_count']; ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-500" type="number" placeholder="Masukkan Semester">
                    </div>
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="">
                            SKS Semester
                        </label>
                        <input name="sks" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-500" type="number" placeholder="Masukkan SKS Semester">
                    </div>
                    <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="">
                        Upload Scan IRS
                    </label>
                    <div class="upload-irs ">
                        <div class="mb-7 upload-file bg-gray-200">
                            <input class="file-input" id="inIRS" type="file" accept=".pdf" name="scanIRS" style="display:none;">
                            <span id="icon-up"><i class="fas fa-cloud-upload-alt text-gray-700"></i></span>
                            <span id="uploaded-file" class="block tracking-wide text-gray-700 text-sm font-bold opacity-75">Upload Scan IRS</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-gray-700 shadow-inner rounded p-3 bg-red-400 mb-7" id="ferror" style="display: none;">
                        <p class="self-center text-slate-100"><strong><i class="fas fa-info-circle"></i> Mohon untuk mengisi semua data.</strong></p>
                    </div>
                    <div class="grid justify-self-end">
                        <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit" name="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('IRS').style.opacity = '2';
        document.getElementById('IRS').style.color = '#4ade80';

        function validateForm() {
            var semester = document.forms["fIRS"]["semester"].value;
            var sks = document.forms["fIRS"]["sks"].value;
            var IRS = document.getElementById("inIRS");
            if (semester == "" || sks == '' || IRS.files.length === 0) {
                document.getElementById('ferror').style.display = "none";
                setTimeout(displayFlex, 300)
                return false;
            }
        }

        function displayFlex() {
            document.getElementById('ferror').style.display = "flex";
        }

        const formUp = document.querySelector(".upload-file"),
            fileInput = document.querySelector(".file-input")

        formUp.addEventListener("click", () => {
            fileInput.click();
        });

        let inIRS = document.getElementById("inIRS");
        let uploadedFile = document.getElementById("uploaded-file");
        let iconUP = document.getElementById("icon-up");


        inIRS.addEventListener("change", () => {
            let inputFile = document.querySelector("input[type=file]").files[0];

            uploadedFile.innerText = inputFile.name;
            iconUP.innerHTML = '<i class="fas fa-file-alt text-gray-700"></i>';
        })
    </script>
</body>

</html>