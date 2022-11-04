<?php
session_start();
require_once('db/db_login.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);

    if ($password == '' || $username == '') {
        $error = '<div class="alert alert-danger">Masukkan username dan Password!</div>';
    } else {
        $query = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . $password . '"';

        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Could not query the database <br />" . mysqli_error($con));
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $role = $row["role"];
                $_SESSION['username'] = $username;
                if ($role == 'mahasiswa') {
                    header('Location: DashboardMahasiswa.php');
                } else if ($role == 'dosen') {
                    header('Location: dashdosen6.php');
                } else if ($role == 'operator') {
                    header('Location: DashboardOperator.php');
                } else if ($role == 'departemen') {
                    header('Location: dashdepartemen5.php');
                }
                $_SESSION['role'] = $role;
                exit;
            } else {
                $error = '<div class="alert alert-danger">Username atau Password yang dimasukkan salah</div>';
            }
        }
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: #f8f9fa;
        }

        @import url(//fonts.googleapis.com/css?family=Lato:300:400);

        body {
            margin: 0;
        }

        h1 {
            font-family: 'Lato', sans-serif;
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 48px;
        }

        p {
            font-family: 'Lato', sans-serif;
            letter-spacing: 1px;
            font-size: 14px;
            color: #333333;
        }

        .header {
            position: relative;
            /* text-align: center; */
            background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
            color: white;
        }


        .inner-header {
            height: 65vh;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .flex {
            /*Flexbox for containers*/
            display: flex;
            justify-content: center;
            align-items: center;
            /* text-align: center; */
        }

        .waves {
            position: relative;
            width: 100%;
            height: 15vh;
            margin-bottom: -7px;
            /*Fix for safari gap*/
            min-height: 100px;
            max-height: 150px;
        }

        .content {
            position: relative;
            height: 20vh;
            text-align: center;
            background-color: white;
        }

        /* Animation */

        .parallax>use {
            animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="header">

        <!--Content before waves-->
        <div class="inner-header flex">
            <div class="grid mx-96 flex" style="margin-top: 20vh;">
                <form class="mx-auto flex flex-col grid card w-96 p-10 bg-gray-50" method="post">
                    <div class="text-center text-5xl font-medium text-gray-500 mb-7">
                        Login
                    </div>
                    <label class="block text-gray-500 text-xl font-bold mb-0 pr-4" for="inline-full-name">
                        Username
                    </label>
                    <div class="mb-5">
                        <input name="username" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="NIM / NIP / Email">
                    </div>
                    <label class="block text-gray-500 text-xl font-bold mb-0 pr-4" for="inline-password">
                        Password
                    </label>
                    <div class="mb-5">
                        <input name="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="password">
                    </div>
                    <div>
                        <?php if (isset($error)) echo $error ?>
                    </div>
                    <div class="justify-self-end">
                        <button name="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
    <!--Header ends-->
</body>

</html>
