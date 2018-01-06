<?php
include_once 'config.php';

$id=$_GET['id'];
$sql="SELECT * FROM siswa  inner join orang_tua on siswa.id_siswa=orang_tua.id_orangtua WHERE id_siswa='".$id."'";
$query=mysqli_query($db,$sql);
$data=mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {
    $id_siswa=$_POST['id'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $jkel=$_POST['jkel'];
    $agama=$_POST['agama'];
    $alamat=$_POST['alamat'];
    $kelas=$_POST['kelas'];
    $jurusan=$_POST['jurusan'];
    $id_orngtua=$_POST['id_orngtua'];
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

    $sql="UPDATE orang_tua SET nama_ayah='".$nama_ayah."', tl_ayah='".$tl_ayah."', tglahir_ayah='".$tglahir_ayah."', peker_ayah='".$peker_ayah."', agama_ayah='".$agama_ayah."', tlp_ayah='".$tlp_ayah."', nama_ibu='".$nama_ibu."', tl_ibu='".$tl_ibu."', tglahir_ibu='".$tglahir_ibu."', peker_ibu='".$peker_ibu."', agama_ibu='".$agama_ibu."', tlp_ibu='".$tlp_ibu."', alamat_orngtua='".$alamat_orngtua."' WHERE id_orangtua='".$id_orngtua."' ";
    $proses="UPDATE siswa SET nis_siswa='".$nis."', nama_siswa='".$nama."', tgl_lahir='".$tgl_lahir."', jkel_siswa='".$jkel."', agama='".$agama."', alamat='".$alamat."', kelas='".$kelas."', jurusan='".$jurusan."' WHERE id_siswa='".$id_siswa."' ";
    $query=mysqli_query($db,$sql);
    $kueri=mysqli_query($db, $proses);

        if ($query and $kueri) {
            header('Location:data_siswa.php?id='.$id.'');
        }else{
            $err_msg="gagal";
        }
}
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Edit data | Buku Induk</title>
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
                                        <p class="heading">Masuk Sebagai Admin
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right side -->
                            <div class="level-right">
                                <div class="level-item">
                                    <p class="level-item">
                                        <a href="admin_page.php">
                                           Kembali
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
                        <div class="column">
                            <h1 class="subtitle is-4">
                                <b>Data Siswa</b>
                            </h1>
                            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $data['id_siswa']?>">
                                <input type="hidden" name="username" value="<?php echo $data['username']?>">
                                <input type="hidden" name="pass" value="<?php echo $data['pass']?>">
                                <input type="hidden" name="id_orngtua" value="<?php echo $data['id_orangtua']?>">
                                <div class="field">
                                    <label class="label" for="nis">NIS :</label>
                                    <div class="control">
                                        <input class="input" type="text" name="nis" placeholder="Masukkan NIS anda" value="<?php echo $data['nis_siswa']?>" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label" for="nama">Nama :</label>
                                    <div class="control">
                                        <input class="input" type="text" name="nama" placeholder="Masukkan nama anda" value="<?php echo $data['nama_siswa']?>" required>
                                    </div>
                                </div>
                                <label class="label" for="tgl_lahir">Tempat Tanggal lahir :</label>
                                <div class="field has-addons">
                                    <p class="control">
                                        <input class="input" type="text" name="tmp_lahir" placeholder="Masukkan tempat anda" value="<?php echo $data['tmp_lahir']?>"
                                            required>
                                    </p>
                                    <p class="control">
                                        <input class="input" type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']?>" required>
                                    </p>
                                </div>
                                <div class="field">
                                    <label class="label" for="jkel">Jenis Kelamin :</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="jkel" required>
                                                <option value="<?php echo $data['jkel_siswa']?>">
                                                    <?php echo $data['jkel_siswa']?>
                                                </option>
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
                                            <select name="agama" required>
                                                <option value="<?php echo $data['agama']?>">
                                                    <?php echo $data['agama']?>
                                                </option>
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
                                        <input class="input" type="text" name="alamat" placeholder="Masukkan alamat anda" value="<?php echo $data['alamat']?>" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label" for="kelas">Kelas :</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="kelas" required>
                                                <option value="<?php echo $data['kelas']?>">
                                                    <?php echo $data['kelas']?>
                                                </option>
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
                                            <select name="jurusan" required>
                                                <option value="<?php echo $data['jurusan']?>">
                                                    <?php echo $data['jurusan']?>
                                                </option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                                <option value="Multimedia">Multimedia</option>
                                                <option value="Mekatronika">Mekatronika</option>
                                                <option value="Teknik Pengolahan Hasil Pertanian">Teknik Pengolahan Hasil Pertanian</option>
                                                <option value="Agribisnis Tanaman Pangan dan Holtikultura">Agribisnis Tanaman Pangan dan Holtikultura</option>
                                                <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                                <option value="Teknik Las">Teknik Las</option>
                                                <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                <option value="Teknik Perbaikan Body Ototmotif">Teknik Perbaikan Body Ototmotif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="column">
                            <h1 class="subtitle is-4">
                                <b>Data Orang tua</b>
                            </h1>
                            <div class="field">
                                <label class="label" for="nama_ayah">Nama Ayah :</label>
                                <div class="control">
                                    <input class="input" type="text" name="nama_ayah" placeholder="Masukkan nama ayah" value="<?php echo $data['nama_ayah']?>"
                                        required>
                                </div>
                            </div>
                            <label class="label" for="tl_ayah">Tempat Tanggal lahir Ayah:</label>
                            <div class="field has-addons">
                                <p class="control">
                                    <input class="input" type="text" name="tl_ayah" placeholder="Masukkan tempat ayah" value="<?php echo $data['tl_ayah']?>"
                                        required>
                                </p>
                                <p class="control">
                                    <input class="input" type="date" name="tglahir_ayah" value="<?php echo $data['tglahir_ayah']?>" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="pker_ayah">Pekerjaan Ayah :</label>
                                <div class="control">
                                    <input class="input" type="text" name="pker_ayah" placeholder="Masukkan pekerjaan ayah" value="<?php echo $data['peker_ayah']?>"
                                        required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="agama_ayah">Agama Ayah:</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="agama_ayah" required>
                                            <option value="<?php echo $data['agama_ayah']?>">
                                                <?php echo $data['agama_ayah']?>
                                            </option>
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
                                    <input class="input" type="number" name="tlp_ayah" placeholder="Masukkan nomor telepon ayah" value="<?php echo $data['tlp_ayah']?>"
                                        required>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label" for="nama_ibu">Nama Ibu :</label>
                                <div class="control">
                                    <input class="input" type="text" name="nama_ibu" placeholder="Masukkan nama ibu" value="<?php echo $data['nama_ibu']?>" required>
                                </div>
                            </div>
                            <label class="label" for="tl_ibu">Tempat Tanggal lahir Ibu:</label>
                            <div class="field has-addons">
                                <p class="control">
                                    <input class="input" type="text" name="tl_ibu" placeholder="Masukkan tempat lahir ibu" value="<?php echo $data['tl_ibu']?>"
                                        required>
                                </p>
                                <p class="control">
                                    <input class="input" type="date" name="tglahir_ibu" value="<?php echo $data['tglahir_ibu']?>" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="pker_ibu">Pekerjaan Ibu :</label>
                                <div class="control">
                                    <input class="input" type="text" name="pker_ibu" placeholder="Masukkan pekerjaan ibu" value="<?php echo $data['peker_ibu']?>"
                                        required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="agama_ibu">Agama Ibu:</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="agama_ibu">
                                            <option value="<?php echo $data['agama_ibu']?>">
                                                <?php echo $data['agama_ibu']?>
                                            </option>
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
                                    <input class="input" type="number" name="tlp_ibu" placeholder="Masukkan nomor telepon ibu" value="<?php echo $data['tlp_ibu']?>"
                                        required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="alamat_orngtua">Alamat Orang tua :</label>
                                <div class="control">
                                    <input class="input" type="text" name="alamat_orngtua" placeholder="Masukkan alamat orang tua" required value="<?php echo $data['alamat_orngtua']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button type="submit" name="simpan" value="Simpan" class="button is-primary">Simpan</button>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <h5 class="subtitle is-danger is-5">
                                        <?php if(isset($err_msg)) echo $err_msg?>
                                    </h5>
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

        </body>

        </html>