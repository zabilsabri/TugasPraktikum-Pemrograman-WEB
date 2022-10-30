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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="d-flex justify-content-center flex-column align-items-center mt-5">
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
                <tr>
                    <th scope="row">1</th>
                    <td>H071211016</td>
                    <td>Zabil Sabri Muhammad</td>
                    <td>Jl. Dg Tata Kompleks Hartaco Indah</td>
                    <td>MIPA</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDataMahasiswa" type="button">Edit</button>
                            <button class="btn btn-danger" type="button">Hapus</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--------------------MODAL----------------------------------->

    <div class="modal fade" id="tambahDataMahasiswa" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="backend" method="POST">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="NIM">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Ekonomi & Bisnis</option>
                                <option value="2">Hukum</option>
                                <option value="3">Kedokteran</option>
                                <option value="3">Teknik</option>
                                <option value="3">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="3">Ilmu Budaya</option>
                                <option value="3">MIPA</option>
                                <option value="3">Peternakan</option>
                                <option value="3">Kedokteran Gigi</option>
                                <option value="3">Kesehatan Masyarakat</option>
                                <option value="3">Ilmu Kelautan & Perikanan</option>
                                <option value="3">Kehutanan</option>
                                <option value="3">Farmasi</option>
                                <option value="3">Pasca Sarjana</option>
                                <option value="3">Keperawatan</option>
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>