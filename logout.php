<?php
session_start();
echo "<script src='sweetalert.min.js'></script>";
echo "<script src='jquery-2.2.3.min.js'></script>";

if (isset($_SESSION['id_siswa'])) {
    echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil logout!',
                text:  'fghj',
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
    session_destroy();
    unset($_SESSION['id_siswa']);
    header('Location:index.php');
}else{
    header('Location:index.php');   
}
?>