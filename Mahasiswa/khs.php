<?php
require('db/db_login.php');

if (isset($_POST['submit'])) {
    $semAktif = $_POST['semAktif'];
    $SKSem = $_POST['SKSSem'];
    $SKSKum = $_POST['SKSKum'];
    $IPS = $_POST['IPK'];
    $IPK = $_POST['IPK'];
    $scanKHS = $_POST['scanKHS'];

    $query = "INSERT INTO khs (semester_mhs, sks_semester, ip_semester, ip_kumulatif, berkas_khs) 
    VALUES ('$semAktif', '$SKSem', '$IPS', '$IPK', '$scanKHS')";
    $query_run = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="nav/style_nav.css" />
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
                <img class="object-contain hover:scale-125 " id="avatar" src="img/olix.png" alt="" />
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
                    <li><a id="IRS" href="irs.php"><i class="fas fa-file-lines"></i> Data IRS</a></li>
                    <li><a id="KHS" href="khs.php"><i class="fas fa-file-lines"></i> Data KHS</a></li>
                    <li><a id="PKL" href="pkl.php"><i class="fas fa-building"></i> Data PKL</a></li>
                    <li><a id="Skripsi" href="skripsi.php"><i class="fas fa-book-bookmark"></i> Data Skripsi</a></li>
                    <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="content-khs card sky-blue-50 grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh;">
            <div class="card-header mb-2" style="font-size: 30px ;font-weight: 700;">Data KHS</div>
            <div class="card-body">
                <form method="POST" name="fKHS" action="" class="grid" onsubmit="return validateForm()">
                    <div class="from-group mt-3 mb-7">
                        <label class="block tracking-wide  text-sm font-bold mb-2" for="grid-state">
                            Semester Aktif
                        </label>
                        <div class="relative">
                            <select name="semAktif" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="">Pilih Semester</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="SKSSem">
                            SKS Semester
                        </label>
                        <input name="SKSSem" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="">
                    </div>
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="SKSKum">
                            SKS Kumulatif
                        </label>
                        <input name="SKSKum" class="appearance-none block w-full bg-gray-200 text-gray-800 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="" disabled>
                    </div>
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="IPS">
                            IP Semester
                        </label>
                        <input name="IPS" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="">
                    </div>
                    <div class="form-group mb-7">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="IPK">
                            IP Kumulatif
                        </label>
                        <input name="IPK" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="">
                    </div>
                    <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="">
                        Upload Scan KHS
                    </label>
                    <div class="upload-khs ">
                        <div class="mb-7 upload-file bg-gray-200">
                            <input class="file-input" id="inKHS" type="file" accept=".pdf" name="scanKHS" style="display:none;">
                            <span id="icon-up"><i class="fas fa-cloud-upload-alt text-gray-700"></i></span>
                            <span id="uploaded-file" class="block tracking-wide text-gray-700 text-sm font-bold opacity-75">Upload Scan KHS</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-gray-700 shadow-inner rounded p-3 bg-red-400 mb-7" id="ferror" style="display: none;">
                        <p class="self-center text-slate-100"><strong><i class="fas fa-info-circle"></i> Mohon untuk mengisi semua data!</strong></p>
                    </div>
                    <div class="justify-self-end">
                        <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('KHS').style.opacity = '2';
        document.getElementById('KHS').style.color = '#4ade80';

        function validateForm() {
            var semAktif = document.forms["fKHS"]["semAktif"].value;
            var SKSSem = document.forms["fKHS"]["SKSSem"].value;
            var SKSKum = document.forms["fKHS"]["SKSKum"].value;
            var IPS = document.forms["fKHS"]["IPS"].value;
            var IPK = document.forms["fKHS"]["IPK"].value;
            var KHS = document.getElementById("inKHS");
            if (semAktif == "" || SKSSem == '' || SKSKum == '' || IPK == '' || IPS == '' || KHS.files.length === 0) {
                document.getElementById('ferror').style.display = "flex";
                return false;
            }
        }

        const formUp = document.querySelector(".upload-file"),
            fileInput = document.querySelector(".file-input")

        formUp.addEventListener("click", () => {
            fileInput.click();
        });

        let inKHS = document.getElementById("inKHS");
        let uploadedFile = document.getElementById("uploaded-file");
        let iconUP = document.getElementById("icon-up");


        inKHS.addEventListener("change", () => {
            let inputFile = document.querySelector("input[type=file]").files[0];

            uploadedFile.innerText = inputFile.name;
            iconUP.innerHTML = '<i class="fas fa-file-alt text-gray-700"></i>';
        })
    </script>
</body>

</html>
