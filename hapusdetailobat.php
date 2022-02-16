<?php

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
