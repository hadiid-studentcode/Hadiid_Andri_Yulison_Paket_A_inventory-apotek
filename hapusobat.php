<?php

require 'koneksi.php';


$ko = $_GET["id"];


if (hapusobat($ko) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'index.php';
            </script>
        ";
}
