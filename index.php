<?php
session_start();

include_once 'config.php';

if (isset($_POST['login'])) {
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $pass=mysqli_real_escape_string($db,$_POST['pass']);
    $result=mysqli_query($db, "SELECT * FROM siswa WHERE username ='".$username."' and pass='".md5($pass)."'");
    
    if ($row=mysqli_fetch_array($result)) {
        $_SESSION['id_siswa'] = $row['id_siswa'];
        $_SESSION['username'] = $row['username'];
        header('Location:tampil_data.php');
    }else{
        $err_msg="Username atau password tidak valid";
    }

}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | buku induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
        <link rel="stylesheet" href="assets/css/bulma.css">
        <link rel="stylesheet" href="sweetalert.min.css">
        <link rel="stylesheet" href="sweetalert.css">
    </head>

    <body>
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <div class="box">
                            <figure class="avatar">
                                <img src="assets/images/profil.png" width="150px">
                            </figure>
                            <h2 class="title has-text-black">Masuk</h2>
                        <p class="subtitle has-text-black">Sebagai</p>
                            <a href="login_siswa.php"><button class="button is-info is-large">Siswa</button>    </a><a href="login_admin.php"><button class="button is-warning is-large">Admin</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="jquery-2.2.3.min.js"></script>
        <script src="sweetalert.min.js"></script>
        <script src="sweetalert.js"></script>

    </body>

    </html>