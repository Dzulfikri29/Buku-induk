<?php
session_start();
include_once 'config.php';

$sql="SELECT * from user inner join siswa on  user.id=siswa.id_siswa inner join orang_tua on user.id=orang_tua.id_orangtua where id='".$_SESSION['id']."'";
$query=mysqli_query($db,$sql);
$data= mysqli_fetch_array($query);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>index | buku induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
        <link rel="stylesheet" href="sweetalert.min.css">
        <link rel="stylesheet" href="sweetalert.css">
    </head>

    <body>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <nav class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <div class="level-item">
                                    <div>
                                        <?php if (isset($_SESSION['id'])) {
                                            echo "<p class='title'>BUKU INDUK</p>";
                                            echo "<p class='heading'>"; 
                                            echo "Masuk Sebagai ";
                                            echo "<b>";
                                                echo $_SESSION['username'];
                                            echo "</b>";
                                            echo "</p>";
                                        }else{
                                            echo "<p class='title'>Maaf, anda belum login</p>";
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            <p class="level-item">
                                <a href="tampil_data.php"><b>Data Saya</b></a>
                            </p>
                            <p class="level-item">
                                <a href="daftar_siswa.php">Data Siswa</a>
                            </p>
                            </p>
                            <p class="level-item">
                                <a href="logout.php">Keluar</a>
                            </p>
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
                        <table class="table is-narrow is-fullwidth">
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">NIS</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                   <?php echo $data['nis_siswa']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Nama</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['nama_siswa']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Tempat Tanggal lahir</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['tmp_lahir']; echo ", "; echo $data['tgl_lahir'] ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Jenis Kelamin</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['jkel_siswa']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Agama</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['agama']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Alamat</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['alamat']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Kelas</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['kelas']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Jurusan</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['jurusan']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="column">
                        <h1 class="subtitle is-4">
                            <b>Data Orang tua</b>
                        </h1>
                        <table class="table is-narrow is-fullwidth">
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Nama Ayah</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['nama_ayah']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Tempat Tanggal lahir Ayah</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                    <?php echo $data['tl_ayah']; echo ", "; echo $data['tglahir_ayah']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Pekerjaan Ayah</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                     <?php echo $data['peker_ayah']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Agama Ayah</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['agama_ayah']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">No. Telepon Ayah</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['tlp_ayah']; ?>
                                </td>
                            </tr>
                        </table>
                        <table class="table is-narrow is-fullwidth">
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Nama Ibu</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['nama_ibu']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Tempat Tanggal lahir Ibu</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['tl_ibu']; echo ", "; echo $data['tglahir_ibu']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Pekerjaan Ibu</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['peker_ibu']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Agama Ibu</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['agama_ibu']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">No. Telepon Ibu</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['tlp_ibu']; ?>
                                </td>
                            </tr>
                            <tr class="table-row-hover-background-color">
                                <td align="center" class="">Alamat Orang tua</td>
                                <td align="center" class="">:</td>
                                <td align="center" class="">
                                <?php echo $data['alamat_orngtua']; ?>
                                </td>
                            </tr>
                        </table>
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
        <script src="sweetalert.min.js"></script>
        <script src="sweetalert.js"></script>
    </body>

    </html>