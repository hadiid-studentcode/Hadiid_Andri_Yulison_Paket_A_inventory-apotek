<?php
require 'koneksi.php';

$obat = mysqli_query($conn, "SELECT * FROM t_obat");


// tambah obat
if (isset($_POST['tambah'])) {

    if (tambahobat($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  ditambah !');
            document.location.href = 'index.php';
            </script>
        ";
    }
}

// ubah obat
if (isset($_POST['ubah'])) {

    if (ubahobat($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil diubah !');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  diubah !');
            document.location.href = 'index.php';
            </script>
        ";
    }
}





?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Apotek</title>
</head>

<body class="container">
    <!-- nav -->
    <nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link active" aria-current="page" href="index.php">Data Obat</a>
                <a class="nav-link" href="detailobat.php">Detail Obat</a>
            </nav>
        </nav>
    </nav><br>
    <!-- head -->
    <header>

        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#tambahobat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> Tambah Obat</button>

        <!-- Modal -->
        <div class="modal fade" id="tambahobat" tabindex="-1" aria-labelledby="tambahobat" aria-hidden="true">
            <div class="modal-dialog">
                <!-- form -->
                <form action="" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- isi form -->
                            <div class="mb-3">
                                <label for="tbhnamaobat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control" name="tbhnamaobat">

                            </div>
                            <div class="mb-3">
                                <label for="tbhjenisobat" class="form-label">Jenis Obat</label>
                                <input type="text" class="form-control" name="tbhjenisobat">
                            </div>
                            <div class="mb-3">
                                <label for="tbhkategoriobat" class="form-label">Kategori Obat</label>
                                <input type="text" class="form-control" name="tbhkategoriobat">
                            </div>
                            <div class="mb-3">
                                <label for="tbhhargaobat" class="form-label">Harga Obat</label>
                                <input type="number" class="form-control" name="tbhhargaobat">
                            </div>
                            <div class="mb-3">
                                <label for="tbhjumlahobat" class="form-label">Jumlah Obat</label>
                                <input type="text" class="form-control" name="tbhjumlahobat">
                            </div>

                            <!-- akhir -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                        </div>
                    </div>
            </div>
            </form>
            <!-- akhir -->
        </div>
    </header>
    <!-- table -->
    <section>

        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Obat</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jenis Obat</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($obat as $obt) : ?>
                <tbody>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $obt['kode_obat']; ?></td>
                        <td><?= $obt['nama_obat']; ?></td>
                        <td><?= $obt['jenis_obat']; ?></td>
                        <td><?= $obt['kategori']; ?></td>
                        <td>Rp.<?= $obt['harga']; ?></td>
                        <td><?= $obt['jumlah']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ubahobat<?= $obt['kode_obat'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg></button>

                                <!-- Modal ubah obat -->
                                <div class="modal fade" id="ubahobat<?= $obt['kode_obat'] ?>" tabindex="-1" aria-labelledby="ubahobat" aria-hidden="true">
                                    <div class="modal-dialog text-start">
                                        <!-- form -->
                                        <form action="" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Obat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- isi form -->
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="kdobat" value="<?= $obt['kode_obat'] ?>" hidden>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhnamaobat" class="form-label">Nama Obat</label>
                                                        <input type="text" class="form-control" name="ubhnamaobat" value="<?= $obt['nama_obat'] ?>">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhjenisobat" class="form-label">Jenis Obat</label>
                                                        <input type="text" class="form-control" name="ubhjenisobat" value="<?= $obt['jenis_obat'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhkategoriobat" class="form-label">Kategori
                                                            Obat</label>
                                                        <input type="text" class="form-control" name="ubhkategoriobat" value="<?= $obt['kategori'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhhargaobat" class="form-label">Harga Obat</label>
                                                        <input type="number" class="form-control" name="ubhhargaobat" value="<?= $obt['harga'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhjumlahobat" class="form-label">Jumlah Obat</label>
                                                        <input type="text" class="form-control" name="ubhjumlahobat" value="<?= $obt['jumlah'] ?>">
                                                    </div>

                                                    <!-- akhir -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="ubah">Ubah
                                                        Data</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- akhir form -->
                                    </div>
                                </div>
                                <a href="hapusobat.php?id=<?= $obt['kode_obat'] ?>">
                                    <button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </a>

                            </div>
                        </td>

                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
        </table>

    </section>

    <!-- footer -->
    <footer>

    </footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>