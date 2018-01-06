<?php
include_once 'config.php';

$sql="SELECT * FROM siswa  order by jurusan and kelas ASC";
$query=mysqli_query($db,$sql);
$x=1;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | Buku Induk</title>
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
                                    <a href="setting_admin.php">
                                        Privasi
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
                    <div class="column is-one-third">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama...">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table is-narrow is-fullwidth is-bordered" id="myTable">
                    <thead>
                        <tr>
                            <td class="is-info">No.</td>
                            <td class="is-info">NIS</td>
                            <td class="is-info">Nama</td>
                            <td class="is-info">Jenis kelamin</td>
                            <td class="is-info">Kelas</td>
                            <td class="is-info">Jurusan</td>
                            <td class="is-info">Opsi</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                while ($data=mysqli_fetch_array($query)) {
                                echo "<tr class='table-row-hover-background-color'>";
                                    echo "<td>".$x++."</td>";
                                    echo "<td>".$data['nis_siswa']."</td>";
                                    echo "<td id='nama'>".$data['nama_siswa']."</td>";
                                    echo "<td>".$data['jkel_siswa']."</td>";
                                    echo "<td>".$data['kelas']."</td>";
                                    echo "<td>".$data['jurusan']."</td>";
                                    echo "<td><a href='data_siswa.php?id=".$data['id_siswa']."'><button class='button is-primary'>Details</button></a> <a href='hapus.php?id=".$data['id_siswa']."'><button class='button is-danger'>Hapus</button></a></td>";
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
        <script>
            function myFunction() {
                // Declare variables 
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </body>

    </html>