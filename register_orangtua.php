<?php
session_start();

include_once 'config.php';
$usernm=$_GET['username'];
$ambil=mysqli_query($db, "SELECT * FROM user where username='$usernm'");
$data_user=mysqli_fetch_array($ambil);

echo "<script src='sweetalert.min.js'></script>";

$error=false;
if (isset($_POST['simpan'])) {
    $nama_ayah=$_POST['nama_ayah'];
    $tl_ayah=$_POST['tl_ayah'];
    $tglahir_ayah=$_POST['tglahir_ayah'];
    $peker_ayah=$_POST['pker_ayah'];
    $agama_ayah=$_POST['agama_ayah'];
    $tlp_ayah=$_POST['tlp_ayah'];
    $nama_ibu=$_POST['nama_ibu'];
    $tl_ibu=$_POST['tl_ibu'];
    $tglahir_ibu=$_POST['tglahir_ibu'];
    $peker_ibu=$_POST['pker_ibu'];
    $agama_ibu=$_POST['agama_ibu'];
    $tlp_ibu=$_POST['tlp_ibu'];
    $alamat_orngtua=$_POST['alamat_orngtua'];

    $proses="INSERT INTO orang_tua(id_orangtua, nama_ayah, tl_ayah, tglahir_ayah, peker_ayah, agama_ayah, tlp_ayah, nama_ibu, tl_ibu, tglahir_ibu, peker_ibu, agama_ibu, tlp_ibu, alamat_orngtua) VALUES ('".$data_user['id']."', '".$nama_ayah."','".$tl_ayah."','".$tglahir_ayah."','".$peker_ayah."','".$agama_ayah."', '".$tlp_ayah."','".$nama_ibu."','".$tl_ibu."','".$tglahir_ibu."','".$peker_ibu."','".$agama_ibu."','".$tlp_ibu."','".$alamat_orngtua."')";
    $kueri=mysqli_query($db,$proses);

    if ($kueri) {
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Sukses!',
                    text:  'Selesai mendaftar',
                    type: 'success',
                    icon:'success',
                    timer: 3000,
                    button:false
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('login_siswa.php');
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
          window.location.replace('login_siswa.php');
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
        <title>Registrasi| Buku Induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
    </head>

    <body>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-2">
                        <?php echo $usernm?>!
                        <p class="subtitle is-5">
                            tambahkan data orang tua anda!
                            <p>
                                <h1>
                </div>
            </div>
        </section>
        <div class="section">
            <div class="container is-fullhd">
                <div class="columns">
                    <div class="column is-one-third is-info">

                    </div>
                    <div class="column">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                        <h1 class="subtitle is-4">
                            <b>Data Orang tua</b>
                        </h1>
                        <div class="field">
                            <label class="label" for="nama_ayah">Nama Ayah :</label>
                            <div class="control">
                                <input class="input" type="text" name="nama_ayah" placeholder="Masukkan nama ayah" required>
                            </div>
                        </div>
                        <label class="label" for="tl_ayah">Tempat Tanggal lahir Ayah:</label>
                        <div class="field has-addons">
                            <p class="control">
                                <input class="input" type="text" name="tl_ayah" placeholder="Contoh : Jakarta">
                            </p>
                            <p class="control">
                                <input class="input" type="date" name="tglahir_ayah" placeholder="Masukkan tanggal lahir ayah" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label" for="pker_ayah">Pekerjaan Ayah :</label>
                            <div class="control">
                                <input class="input" type="text" name="pker_ayah" placeholder="Masukkan pekerjaan ayah" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="agama_ayah">Agama Ayah:</label>
                            <div class="control">
                                <div class="select">
                                    <select name="agama_ayah">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="tlp_ayah">No. Telepon Ayah :</label>
                            <div class="control">
                                <input class="input" type="number" name="tlp_ayah" placeholder="Masukkan nomor telepon ayah" required>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <label class="label" for="nama_ibu">Nama Ibu :</label>
                            <div class="control">
                                <input class="input" type="text" name="nama_ibu" placeholder="Masukkan nama ibu" required>
                            </div>
                        </div>
                        <label class="label" for="tl_ibu">Tempat Tanggal lahir Ibu:</label>
                        <div class="field has-addons">
                            <p class="control">
                                <input class="input" type="text" name="tl_ibu" placeholder="Contoh : Jakarta">
                            </p>
                            <p class="control">
                                <input class="input" type="date" name="tglahir_ibu" placeholder="Masukkan tanggal lahir ibu" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label" for="pker_ibu">Pekerjaan Ibu :</label>
                            <div class="control">
                                <input class="input" type="text" name="pker_ibu" placeholder="Masukkan pekerjaan ibu" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="agama_ibu">Agama Ibu:</label>
                            <div class="control">
                                <div class="select">
                                    <select name="agama_ibu">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="tlp_ibu">No. Telepon Ibu :</label>
                            <div class="control">
                                <input class="input" type="number" name="tlp_ibu" placeholder="Masukkan nomor telepon ibu" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="alamat_orngtua">Alamat Orang tua :</label>
                            <div class="control">
                                <input class="input" type="text" name="alamat_orngtua" placeholder="Masukkan alamat orang tua" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" name="simpan" value="simpan" class="button is-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="column">

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