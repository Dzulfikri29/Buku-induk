<?php
include_once 'config.php';
echo "<script src='sweetalert.min.js'></script>";

if (isset($_POST['login'])) {

    $username=mysqli_real_escape_string($db, $_POST['username']);
    $pass=mysqli_real_escape_string($db,$_POST['pass']);
    $result=mysqli_query($db, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");

    if ($row=mysqli_fetch_array($result)) {
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Sukses!',
                    text:  'Berhasil masuk',
                    type: 'success',
                    icon:'success',
                    timer: 3000,
                    button:false
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('admin_page.php');
         } ,3000); 
        </script>";
    }else{
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Gagal!',
                    text:  'Username atau password salah',
                    type: 'error',
                    icon:'error',
                    timer: 3000,
                    button:false
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('login_admin.php');
         } ,3000); 
        </script>";
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
    </head>

    <body>
        <section class="hero is-warning is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h2 class="title has-text-white">Login</h2>
                        <p class="subtitle has-text-white">Admin | SMK Coding</p>
                        <div class="box">
                            <figure class="avatar">
                                <img src="assets/images/profil.png" width="150px">
                            </figure>
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Masukkan nama pengguna" name="username" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="password" placeholder="Masukkan kata sandi" name="pass" required>
                                    </div>
                                </div>
                                <button class="button is-block is-info is-medium" name="login">Masuk</button>
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="jquery-2.2.3.min.js"></script>

    </body>

    </html>