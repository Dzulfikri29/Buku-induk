<?php
session_start();
include_once 'config.php';

$usernm=$_GET['username'];
$ambil=mysqli_query($db, "SELECT * FROM user where username='$usernm'");
$data_user=mysqli_fetch_array($ambil);

echo "<script src='sweetalert.min.js'></script>";

if (isset($_POST['simpan'])) {
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $tmp_lahir=$_POST['tmp_lahir'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $jkel=$_POST['jkel'];
    $agama=$_POST['agama'];
    $alamat=$_POST['alamat'];
    $kelas=$_POST['kelas'];
    $jurusan=$_POST['jurusan'];
    
    $sql="INSERT INTO siswa(id_siswa, nis_siswa, nama_siswa, tmp_lahir, tgl_lahir, jkel_siswa, agama, alamat, kelas, jurusan) VALUES ('".$data_user['id']."', '".$nis."','".$nama."','".$tmp_lahir."', '".$tgl_lahir."', '".$jkel."','".$agama."','".$alamat."','".$kelas."','".$jurusan."')";
    $query=mysqli_query($db,$sql);

    if ($query) {
        header('Location:register_orangtua.php?username='.$usernm.'');
    }else {
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
          window.location.replace('register_siswa.php');
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
                        Selamat datang,
                        <?php echo $usernm?>!
                        <p class="subtitle is-5">
                            tambahkan data diri anda!
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
                                <b>Tambahkan data diri</b>
                            </h1>
                            <div class="field">
                                <label class="label" for="nis">NIS :</label>
                                <div class="control">
                                    <input class="input" type="text" name="nis" placeholder="Masukkan nis anda" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="nama">Nama :</label>
                                <div class="control">
                                    <input class="input" type="text" name="nama" placeholder="Contoh : Dzulfikri Safrilian" required>
                                </div>
                            </div>
                            <label class="label" for="tgl_lahir">Tempat Tanggal lahir :</label>
                            <div class="field has-addons">
                                <p class="control">
                                    <input class="input" type="text" name="tmp_lahir" placeholder="Contoh : Jakarta">
                                </p>
                                <p class="control">
                                    <input class="input" type="date" name="tgl_lahir" placeholder="Masukkan tanggal lahir anda" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="jkel">Jenis Kelamin :</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="jkel">
                                            <option value="">Pilih jenis kelamin anda</option>
                                            <option value="Laki - laki">Laki - laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="agama">Agama :</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="agama">
                                            <option value="">Pilih Agama Anda</option>
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
                                <label class="label" for="alamat">Alamat :</label>
                                <div class="control">
                                    <input class="input" type="text" name="alamat" placeholder="Masukkan alamat anda" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="kelas">Kelas :</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="kelas">
                                            <option value="">Pilih Kelas Anda</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="jurusan">Jurusan :</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="jurusan">
                                            <option value="">Pilih Jurusan Anda</option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Mekatronika">Mekatronika</option>
                                            <option value="Teknik Pengolahan Hasil Pertanian">TPHP</option>
                                            <option value="Agribisnis Tanaman Pangan dan Holtikultura">Agribisnis Tanaman Pangan dan Holtikuktura</option>
                                            <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                            <option value="Teknik Las">Teknik Las</option>
                                            <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                            <option value="Teknik Perbaikan Body Otomotif">Teknik Perbaikan Body Ototmotif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button type="submit" name="simpan" value="simpan" class="button is-info">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="column is-one-third">

                    </div>
                    </form>
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