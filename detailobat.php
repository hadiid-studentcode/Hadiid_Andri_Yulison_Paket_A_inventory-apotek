<?php
require 'koneksi.php';

$detail = mysqli_query($conn, "SELECT * FROM t_detailobat");

// tambah obat
if (isset($_POST['tambah'])) {

    if (tambahdetailobat($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'detailobat.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  ditambah !');
            document.location.href = 'detailobat.php';
            </script>
        ";
    }
}

// ubah detail obat
if (isset($_POST['ubah'])) {

    if (ubahdetailobat($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil diubah !');
            document.location.href = 'detailobat.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  diubah !');
            document.location.href = 'detailobat.php';
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

        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#tambahdetailobat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> Tambah Detail Obat</button>
        <!-- Modal -->
        <div class="modal fade" id="tambahdetailobat" tabindex="-1" aria-labelledby="tambahdetailobat" aria-hidden="true">
            <div class="modal-dialog">
                <!-- form -->
                <form action="" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Detail Obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- isi form -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Kode Obat</label>
                                <select class="form-select" id="inputGroupSelect01" name="tbhkodeobat">
                                    <option selected>Kode Obat</option>

                                    <?php $obat1 = mysqli_query($conn, "SELECT kode_obat, nama_obat FROM t_obat"); ?>
                                    <?php while ($obd1 = mysqli_fetch_array($obat1)) : ?>
                                        <option value="<?= $obd1["kode_obat"]; ?>"><?= $obd1["nama_obat"]; ?></option>

                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tbhdosisobat" class="form-label">Dosis Obat</label>
                                <input type="text" class="form-control" name="tbhdosisobat">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="tbhsubtotal" class="form-label">Sub Total Obat</label>
                                <input type="number" class="form-control" name="tbhsubtotal" disabled>
                            </div> -->



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
                    <th scope="col">No Resep</th>
                    <th scope="col">Kode Obat</th>
                    <th scope="col">Dosis Obat</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php while ($detailobat = mysqli_fetch_assoc($detail)) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $detailobat['no_resep']; ?></td>
                        <td><?= $detailobat['kode_obat']; ?></td>
                        <td><?= $detailobat['dosis']; ?></td>
                        <td><?= $detailobat['sub_total']; ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ubahdetailobat<?= $detailobat['no_resep']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg></button>
                                <!-- Modal ubah obat -->
                                <div class="modal fade" id="ubahdetailobat<?= $detailobat['no_resep']; ?>" tabindex="-1" aria-labelledby="ubahdetailobat" aria-hidden="true">
                                    <div class="modal-dialog text-start">
                                        <!-- form -->
                                        <form action="" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Detail Obat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- isi form -->

                                                    <input type="text" class="form-control" name="noresep" value="<?= $detailobat['no_resep']; ?>" hidden>

                                                    <div class="mb-3">
                                                        <label for="ubhdosisobat" class="form-label">Dosis Obat</label>
                                                        <input type="text" class="form-control" name="ubhdosisobat" value="<?= $detailobat['dosis']; ?>">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubhsubtotal" class="form-label">Sub Total Obat</label>
                                                        <input type="number" class="form-control" name="ubhsubtotal" value="<?= $detailobat['sub_total']; ?>" disabled>
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
                                <a href="hapusdetailobat.php?nr=<?= $detailobat['no_resep']; ?>">
                                    <button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg></button>
                                </a>
                            </div>
                        </td>

                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
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