<?php
include_once 'config.php';

echo "<script src='sweetalert.min.js'></script>";

$sql="SELECT * FROM admin";
$query=mysqli_query($db,$sql);
$data=mysqli_fetch_array($query);

$error=false;
if (isset($_POST['simpan'])) {
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];

    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        $error=true;
        $username_error="Username harus terdiri dari huruf";
    }

    if (strlen($password) < 3){
        $error=true;
        $password_error="Password minimal terdiri dari 8 karakter";
    }

    if ($c_password != $password) {
        $error=true;
        $c_password_error="Password tidak sesuai";
    }

    $sql="UPDATE admin set username='$username', password='$password' WHERE id=$id";
    $query=mysqli_query($db,$sql);
    if (!$error) {
        if ($query) {
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                       title: 'Sukses!',
                       text:  'Berhasil Merubah data',
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
                        text:  'Gagal merubah data, silahkan ulangi lagi !',
                        type: 'error',
                        icon:'error',
                        timer: 3000,
                        button:false
                    });  
             },10); 
             window.setTimeout(function(){ 
              window.location.replace('setting_admin.php');
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
        <title>Edit Data Admin| Buku Induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
    </head>

    <body>
        <section class="hero is-warning">
            <div class="hero-body">
                <div class="container">
                    <nav class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <div>
                                    <p class="title">BUKU INDUK</p>
                                    <p class="heading">Masuk Sebagai ADMIN
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            <div class="level-item">
                                <p class="level-item">
                                    <a href="admin_page.php">
                                        kembali
                                    </a>
                                </p>
                                <p class="level-item">
                                    <a href="index.php">
                                        Keluar
                                    </a>
                                </p>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
        <div class="section">
            <div class="container is-fullhd">
                <div class="columns">
                    <div class="column is-one-third"></div>
                    <div class="column is-one-third">
                        <h1 class="subtitle is-4">
                            <b>Edit Username dan Password</b>
                        </h1>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                            <div class="field">
                                <label class="label" for="username">Username :</label>
                                <div class="control">
                                    <input class="input  " type="text" name="username" value="<?php echo $data['username'];?>" placeholder="Contoh : Dzulfikri"
                                        required>
                                    <p class="help is-danger">
                                        <?php if(isset($username_error)) echo $username_error?>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="password">Password :</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="Masukkan password baru" required>
                                    <p class="help is-danger">
                                        <?php if(isset($password_error)) echo $password_error?>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="c_password">Konfirmasi password :</label>
                                <div class="control">
                                    <input class="input" type="password" name="c_password" placeholder="Konfirmasi password baru" required>
                                    <p class="help is-danger">
                                        <?php if(isset($c_password_error)) echo $c_password_error?>
                                    </p>
                                </div>
                                <div class="control">
                                    <button type="submit" name="simpan" value="simpan" class="button is-primary">Simpan</button>
                                </div>
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