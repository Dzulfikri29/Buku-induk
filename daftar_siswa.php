<?php
session_start();

include_once 'config.php';

$sql="SELECT * FROM siswa  order by kelas and jurusan ASC";
$query=mysqli_query($db,$sql);
$x=1;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daftar siswa | Buku Induk</title>
        <link rel="stylesheet" href="assets/css/bulma.css">
    </head>

    <body>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <nav class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <div>
                                    <p class="title">BUKU INDUK</p>
                                    <p class="heading">Masuk Sebagai
                                        <?php echo $_SESSION['username']?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            <div class="level-item">
                                <p class="level-item">
                                    <a href="tampil_data.php">
                                        Data Saya
                                    </a>
                                </p>
                                <p class="level-item">
                                    <a href="daftar_siswa.php">
                                        <b>Data Siswa</b>
                                    </a>
                                </p>
                                <p class="level-item">
                                    <a href="logout.php">
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
                <table class="table is-narrow is-fullwidth is-bordered">
                    <thead>
                        <tr>
                            <td class="is-info">No.</td>
                            <td class="is-info">NIS</td>
                            <td class="is-info">Nama</td>
                            <td class="is-info">Jenis kelamin</td>
                            <td class="is-info">Kelas</td>
                            <td class="is-info">Jurusan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                while ($data=mysqli_fetch_array($query)) {
                                echo "<tr class='table-row-hover-background-color'>";
                                    echo "<td>".$x++."</td>";
                                    echo "<td>".$data['nis_siswa']."</td>";
                                    echo "<td>".$data['nama_siswa']."</td>";
                                    echo "<td>".$data['jkel_siswa']."</td>";
                                    echo "<td>".$data['kelas']."</td>";
                                    echo "<td>".$data['jurusan']."</td>";
                                echo "</tr>";
                                }
                            ?>
                    </tbody>
                </table>
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