<?php
session_start();

include_once 'config.php';
echo "<script src='sweetalert.min.js'></script>";

$error=false;
if (isset($_POST['daftar'])) {
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $c_password=$_POST['c_password'];

    $sql="INSERT INTO user(id, username, pass) VALUES ('','".$username."', '".md5($pass)."')";
    $query=mysqli_query($db,$sql);

    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        $error=true;
        $username_error="Username harus terdiri dari huruf";
    }

    if (strlen($pass) < 8){
        $error=true;
        $password_error="Password minimal terdiri dari 8 karakter";
    }

    if ($c_password != $pass) {
        $error=true;
        $c_password_error="Password tidak sesuai";
    }

    if (!$error) {
        if ($query) {
           header('Location:register_siswa.php?username='.$username.'');
        }else{
            echo "
            <script type='text/javascript'>
             setTimeout(function () { 
             swal({
                        title: 'Gagal!',
                        text:  'if (isset($user_error)) {
                            echo $user_error;
                        }',
                        type: 'error',
                        icon:'error',
                        timer: 3000,
                        button:false
                    });  
             },10); 
             window.setTimeout(function(){ 
              window.location.replace('form_register.php');
             } ,3000); 
            </script>";
        }
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registrasi| Buku Induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
    </head>

    <body>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Buku Induk
                    </h1>
                    <h2 class="subtitle">
                        SMK Coding | Daftar
                    </h2>
                </div>
            </div>
        </section>
        <div class="section">
            <div class="container is-fullhd">
                <div class="columns">
                    <div class="column is-one-third"></div>
                    <div class="column is-one-third is-info">
                        <h1 class="subtitle is-4">
                            <b>Buat akun</b>
                        </h1>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="field">
                                <label class="label" for="username">Username :</label>
                                <div class="control">
                                    <input class="input  " type="text" name="username" placeholder="Contoh : Dzulfikri" required>
                                    <p class="help is-danger">
                                        <?php if(isset($username_error)) echo $username_error?>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="password">Password :</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="Minimal terdiri dari 8 karakter" required>
                                    <p class="help is-danger">
                                        <?php if(isset($password_error)) echo $password_error?>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="c_password">Konfirmasi password :</label>
                                <div class="control">
                                    <input class="input" type="password" name="c_password" placeholder="Konfirmasi password" required>
                                    <p class="help is-danger">
                                        <?php if(isset($c_password_error)) echo $c_password_error?>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <h5 class="subtitle is-success is-5">
                                        <?php if(isset($succes_msg)) echo $succes_msg?>
                                    </h5>
                                    <h5 class="subtitle is-danger is-5">
                                        <?php if(isset($err_msg)) echo $err_msg?>
                                    </h5>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button type="submit" name="daftar" value="Daftar" class="button is-info">Daftar</button>
                                </div>
                                <p>Sudah mendaftar?
                                    <a href="index.php">Login disini!</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <strong>Created</strong> by Dzulfikri Safrilian | XI RPL SMK NUSA
                    </p>
                </div>
            </div>
        </footer>
        <script src="jquery-2.2.3.min.js"></script>
    </body>

    </html>