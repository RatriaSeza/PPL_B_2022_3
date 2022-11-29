<?php
    require('../db/db_login.php');
    if (isset($_POST['submit'])) {
        $nim = ($_POST['nim']);
        $status = ($_POST['status']);
        $nilai = ($_POST['nilai']);
        $scanPKL = ($_POST['scanPKL']);
        $query = "INSERT INTO pkl (nim_mhs, status_pkl, nilai_pkl, ba_pkl) VALUES ('$nim', '$status', '$nilai', '$scanPKL')";
        $query_run = mysqli_query($con, $query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../nav/style_nav.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
                <img class="shrink" id="avatar" src="img/olix.png" alt="" />
                <div class="flex-row ml-5">
                    <p class="username">Olivia Rodrigo
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
                    <li><a id="Logout" href="logout.php"><i class="fas fa-right-from-bracket"></i> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="content-khs card sky-blue-50 grow" style="padding:50px 70px; margin-top: 10vh; margin-bottom:10vh; margin-right:5vw;">
            <div class="card-header mb-2" style="font-size: 30px ;font-weight: 700;">Data PKL</div>
            <div class="card-body">
                <form method="POST" name="fPKL" action="" class="grid dropzone" onsubmit="return validateForm()">
                    <div class="form-group mt-3 ">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-city">
                            NIM
                        </label>
                        <input name="nim" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="">
                    </div>
                    <div class="form-group mt-5 ">
                        <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-city">
                            Status PKL
                        </label>
                    </div>
                    <div class="form-group mt-2 ">
                        <input id="default-radio-1" type="radio" value="Sudah" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Sudah</label>
                    </div>
                    <div class="form-group mt-2 ">
                        <input id="default-radio-1" type="radio" value="Belum" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Belum</label>
                    </div>
                    <div class="from-group mt-3">
                        <label class="block tracking-wide  text-sm font-bold mb-2" for="grid-state">
                            Nilai PKL
                        </label>
                        <div class="relative">
                            <select name="nilai" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="">Pilih Nilai</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 ">
                    <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2" for="">
                        Upload Berita Acara
                    </label>
                    <div class="upload-pkl ">
                        <div class="mb-7 upload-file bg-gray-200">
                            <input class="file-input" id="inPKL" type="file" accept=".pdf" name="scanPKL" style="display:none;">
                            <span id="icon-up"><i class="fas fa-cloud-upload-alt text-gray-700"></i></span>
                            <span id="uploaded-file" class="block tracking-wide text-gray-700 text-sm font-bold opacity-75">Upload Berita Acara</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-gray-700 shadow-inner rounded p-3 bg-red-400 mb-7" id="ferror" style="display: none;">
                        <p class="self-center text-slate-100"><strong><i class="fas fa-info-circle"></i> Mohon untuk mengisi semua data!</strong></p>
                    </div>
                    <div class="justify-self-end">
                        <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('PKL').style.opacity = '2';
        document.getElementById('PKL').style.color = '#4ade80';

        function validateForm() {
            var nim = document.forms["fPKL"]["nim"].value;
            var status = document.forms["fPKL"]["status"].value;
            var nilai = document.forms["fPKL"]["nilai"].value;
            var pkl = document.getElementById("inPKL");
            if (nim == "" || status == '' || nilai == '' || pkl.files.length === 0) {
                document.getElementById('ferror').style.display = "flex";
                return false;
            }
        }

        const formUp = document.querySelector(".upload-file"),
            fileInput = document.querySelector(".file-input")

        formUp.addEventListener("click", () => {
            fileInput.click();
        });

        let inPKL = document.getElementById("inPKL");
        let uploadedFile = document.getElementById("uploaded-file");
        let iconUP = document.getElementById("icon-up");

        inPKL.addEventListener("change", () => {
            let inputFile = document.querySelector("input[type=file]").files[0];

            uploadedFile.innerText = inputFile.name;
            iconUP.innerHTML = '<i class="fas fa-file-alt text-gray-700"></i>';
        })
    </script>
</body>
</html>
