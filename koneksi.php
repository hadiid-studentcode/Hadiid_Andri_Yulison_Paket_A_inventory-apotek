<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_apotek";

$conn = mysqli_connect($server, $username, $password, $database) or die("koneksi gagal");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapusobat($ko)
{
    
    global $conn;
    mysqli_query($conn, "DELETE FROM t_obat WHERE kode_obat = $ko");



    return mysqli_affected_rows($conn);
}

function hapusdetailobat($nor){
    global $conn;
    mysqli_query($conn, "DELETE FROM t_detailobat WHERE no_resep = $nor");



    return mysqli_affected_rows($conn);

}

function tambahobat($data)
{
    global $conn;
    $nama = ($data['tbhnamaobat']);
    $jenis = ($data['tbhjenisobat']);
    $kategori = ($data['tbhkategoriobat']);
    $harga = ($data['tbhhargaobat']);
    $jumlah = ($data['tbhjumlahobat']);

    $query =  "INSERT t_obat VALUES (
        '',
        '$nama',
        '$jenis',
        '$kategori',
        '$harga',
        '$jumlah'

    )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahdetailobat($data){
    global $conn;
    $kode = ($data['tbhkodeobat']);
    $dosis = ($data['tbhdosisobat']);



   
    
    $query = mysqli_query($conn,"SELECT harga,jumlah from t_obat WHERE kode_obat = '$kode'");
    $total2 = mysqli_fetch_assoc($query);

    $harga = ($total2['harga']);
    $jumlah = ($total2['jumlah']);

    $total = $harga * $jumlah;


    $query =  "INSERT t_detailobat VALUES (
        '',
        '$kode',
        '$dosis',
        '$total'


    )";
    mysqli_query($conn, $query);
   

    return mysqli_affected_rows($conn);
    

}

function ubahobat($data)
{
    global $conn;
    $kode = ($data['kdobat']);
    $nama = ($data['ubhnamaobat']);
    $jenis = ($data['ubhjenisobat']);
    $kategori = ($data['ubhkategoriobat']);
    $harga = ($data['ubhhargaobat']);
    $jumlah = ($data['ubhjumlahobat']);

    // query ubah data
    $query = "UPDATE t_obat SET
                nama_obat = '$nama',
                  jenis_obat = '$jenis',
                kategori = '$kategori',
                harga = '$harga',
                 jumlah = '$jumlah'
                WHERE kode_obat = $kode
             ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahdetailobat($data){
    global $conn;
    $noResep = ($data['noresep']);
    $dosis = ($data['ubhdosisobat']);

    // query ubah data
    $query = "UPDATE t_detailobat SET
                 dosis = '$dosis'
                WHERE no_resep = '$noResep'
             ";

    mysqli_query($conn, $query);
  

    return mysqli_affected_rows($conn);
   
}
