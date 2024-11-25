<?php

//panggil koneksi database
include "conn.php";

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO result (nama, tipe, nomor, checkin)
                                    VALUES ('$_POST[tnama]',
                                            '$_POST[tkamar]',
                                            '$_POST[tnomor]',
                                            '$_POST[tcheckin]') ");
    //jika simpan sukses
    if($simpan) {
        echo "<script>
                alert('Simpan data Sukses!');
                document.location='index.php';
             </script>";
    } else {
        echo "<script>
                alert('Simpan data Gagal!');
                document.location='index.php'
             </script>";
    }
}


//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {

    //persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE result SET
                                                                    nama = '$_POST[tnama]',
                                                                    tipe = '$_POST[tkamar]',
                                                                    nomor = '$_POST[tnomor]',
                                                                    checkin = '$_POST[tcheckin]'
                                                                WHERE id_data = '$_POST[id_data]'
                                                                    ");
    //jika ubah sukses
    if($ubah) {
        echo "<script>
                alert('Ubah data Sukses!');
                document.location='index.php';
             </script>";
    } else {
        echo "<script>
                alert('Ubah data Gagal!');
                document.location='index.php'
             </script>";
    }
}

//uji jika tombol hapus diklik
if (isset($_POST['bhapus'])) {

    //persiapan ubah data
    $hapus = mysqli_query($koneksi, "DELETE FROM result WHERE id_data = '$_POST[id_data]' ");


    //jika hapus sukses
    if($hapus) {
        echo "<script>
                alert('Hapus data Sukses!');
                document.location='index.php';
             </script>";
    } else {
        echo "<script>
                alert('Hapus data Gagal!');
                document.location='index.php'
             </script>";
    }
}
?>