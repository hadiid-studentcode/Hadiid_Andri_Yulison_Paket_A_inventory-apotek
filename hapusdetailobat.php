<!--HADIID ANDRI YULISON 200402076   -->
<!-- hapusdetailobat.php -->
<?php
// HADIID ANDRI YULISON 200402076 
require 'koneksi.php';


$nor = $_GET["nr"];


if (hapusdetailobat($nor) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'detailobat.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'detailobat.php';
            </script>
        ";
}
