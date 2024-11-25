<?php

//panggil koneksi database
include "conn.php"


    ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP SONA HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mt-3">
            <h3 class="text-center">Sona Hotel Reservation</h3>
            <h3 class="text-center">Hotel J & N</h3>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                Your Data Booking
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>
                <button type="button" class= "btn btn-info mb-3" onclick="window.location.href='index.html'">Home</button>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tipe Kamar</th>
                        <th>Nomor Kamar</th>
                        <th>Check In</th>
                        <th>Aksi</th>
                    </tr>


                    <?php
                    //persiapan menampilkan data 
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM result ORDER BY id_data DESC");
                    while ($data = mysqli_fetch_array($tampil)):

                        ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tipe'] ?></td>
                            <td><?= $data['nomor'] ?></td>
                            <td><?= $data['checkin'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal buat update-->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Reservasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_data" value="<?= $data['id_data']?>">
                                        <div class="modal-body">


                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="tnama" value="<?=$data['nama']?>" placeholder="">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Tipe Kamar</label>
                                                <select class="form-select" name="tkamar">
                                                    <option value="<?=$data['tipe']?>"><?=$data['tipe']?></option>
                                                    <option value="Single Room">Single Room</option>
                                                    <option value="Double Room">Double Room</option>
                                                    <option value="Premium King Room">Premium King Room</option>
                                                    <option value="Deluxe Room">Deluxe Room</option>
                                                    <option value="Family Room">Family Room</option>
                                                    <option value="Luxury Room">Luxury Room</option>
                                                    <option value="Room with View">Room with View</option>
                                                    <option value="Small View">Small View</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nomor Kamar</label>
                                                <input type="text" class="form-control" name="tnomor" value="<?=$data['nomor']?>" placeholder="">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Check In</label>
                                                <input type="date" class="form-control" name="tcheckin" value="<?=$data['checkin']?>" placeholder="">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal buat update -->

                        <!-- Awal Modal buat hapus-->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Reservasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_data" value="<?= $data['id_data']?>">
                                        <div class="modal-body">

                                            <h5 class="text-center">Apakah anda yakin ingin menhapus data ini? <br>
                                                <span class="text-danger"><?= $data['nama'] ?> - <?= $data['tipe'] ?></span>
                                            </h5>
                                            


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus saja!</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal buat hapus-->


                    <?php endwhile; ?>
                </table>


                <!-- Awal Modal -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Reservasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">


                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="tnama" placeholder="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tipe Kamar</label>
                                        <select class="form-select" name="tkamar">
                                            <option></option>
                                            <option value="Single Room">Single Room</option>
                                            <option value="Double Room">Double Room</option>
                                            <option value="Premium King Room">Premium King Room</option>
                                            <option value="Deluxe Room">Deluxe Room</option>
                                            <option value="Family Room">Family Room</option>
                                            <option value="Luxury Room">Luxury Room</option>
                                            <option value="Room with View">Room with View</option>
                                            <option value="Small View">Small View</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Kamar</label>
                                        <input type="text" class="form-control" name="tnomor" placeholder="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Check In</label>
                                        <input type="date" class="form-control" name="tcheckin" placeholder="">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->





            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>