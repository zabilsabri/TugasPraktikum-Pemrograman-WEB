<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Tugas 6</span>
        </div>
    </nav>
    <div class="heading">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Data</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#tambahDataMahasiswa" href="#">+ Tambah Mahasiswa</a>
                    </li>
                </ul>
                <form class="d-flex" method="GET" action="index.php" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="d-flex justify-content-center flex-column align-items-center mt-5">
        <?php if(isset($_GET['exist'])){ ?>
            <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                <strong>Mahasiswa Dengan NIM Tersebut Sudah Ada!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table class="table w-75">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';

                if(isset($_GET['search'])){
                    $dataMahasiswa = mysqli_query($conn, "select * from `data` where CONCAT(NIM, Nama, Alamat, Fakultas) like '%" .$_GET['search']. "%'");
                } else {
                    $dataMahasiswa = mysqli_query($conn, "select * from `data`");
                }
                
                $jumlahRow = mysqli_num_rows($dataMahasiswa);

                $nomor = 1;

                while($rowDataMahasiswa = mysqli_fetch_array($dataMahasiswa)){
                    $nim = $rowDataMahasiswa['NIM'];
                    $nama = $rowDataMahasiswa['Nama'];
                    $alamat = $rowDataMahasiswa['Alamat'];
                    $fakultas = $rowDataMahasiswa['Fakultas'];

                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++ ?></th>
                    <td><?php echo $nim ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $fakultas ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDataMahasiswa<?= $nim ?>" type="button">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusDataMahasiswa<?= $nim ?>" type="button">Hapus</button>
                        </div>
                    </td>
                </tr>
                
                <!--------------------MODAL Hapus Data Mahasiswa---------------------------------->

                <div class="modal fade" id="hapusDataMahasiswa<?= $nim ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">Confirm</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Hapus Data <?php echo $nama ?> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger" href="hapusData.php?nim=<?= $nim ?>">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--------------------MODAL Edit Data Mahasiswa----------------------------------->

                <div class="modal fade" id="editDataMahasiswa<?= $rowDataMahasiswa['NIM'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Edit Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="editData.php?nim=<?= $nim ?>" method="POST">
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nim</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $rowDataMahasiswa['NIM'] ?>" class="form-control" name="NIM" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $rowDataMahasiswa['Nama'] ?>" class="form-control" name="Nama" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $rowDataMahasiswa['Alamat'] ?>" class="form-control" name="Alamat" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas</label>
                                        <div class="col-sm-10">
                                        <select class="form-select" name="Fakultas" aria-label="Default select example" required>
                                            <option selected><?php echo $rowDataMahasiswa['Fakultas'] ?></option>
                                            <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
                                            <option value="Hukum">Hukum</option>
                                            <option value="Kedokteran">Kedokteran</option>
                                            <option value="Teknik">Teknik</option>
                                            <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                            <option value="Ilmu Budaya">Ilmu Budaya</option>
                                            <option value="Mipa">MIPA</option>
                                            <option value="Peternakan">Peternakan</option>
                                            <option value="Kedokteran Gigi">Kedokteran Gigi</option>
                                            <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                            <option value="Ilmu Kelautan & Perikanan">Ilmu Kelautan & Perikanan</option>
                                            <option value="Kehutanan">Kehutanan</option>
                                            <option value="Farmasi">Farmasi</option>
                                            <option value="Pasca Sarjana">Pasca Sarjana</option>
                                            <option value="Keperawatan">Keperawatan</option>
                                        </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-primary">Simpan Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </tbody>
        </table>
    </div>

    <!--------------------MODAL Tambah Data Mahasiswa----------------------------------->

    <div class="modal fade" id="tambahDataMahasiswa" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="inputData.php" method="POST">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NIM" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nama" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Alamat" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                            <select class="form-select" name="Fakultas" aria-label="Default select example" required>
                                <option selected>Open this select menu</option>
                                <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
                                <option value="Hukum">Hukum</option>
                                <option value="Kedokteran">Kedokteran</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Ilmu Budaya">Ilmu Budaya</option>
                                <option value="Mipa">MIPA</option>
                                <option value="Peternakan">Peternakan</option>
                                <option value="Kedokteran Gigi">Kedokteran Gigi</option>
                                <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                <option value="Ilmu Kelautan & Perikanan">Ilmu Kelautan & Perikanan</option>
                                <option value="Kehutanan">Kehutanan</option>
                                <option value="Farmasi">Farmasi</option>
                                <option value="Pasca Sarjana">Pasca Sarjana</option>
                                <option value="Keperawatan">Keperawatan</option>
                            </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>