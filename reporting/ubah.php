<?php

require 'function.php';

//ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>

<body>

    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"] ?>">
        <ul>
            <li>
                <label for="Nama"> NAMA : </label>
                <input type="text" name="Nama" id="Nama" required value="<?= $mhs["Nama"] ?>">
            </li>
            <li>
                <label for="Nim"> NIM : </label>
                <input type="text" name="Nim" id="Nim" required value="<?= $mhs["Nim"] ?>">
            </li>
            <li>
                <label for="Jurusan"> JURUSAN : </label>
                <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs["Jurusan"] ?>">
            </li>
            <li>
                <label for="Email"> EMAIL : </label>
                <input type="text" name="Email" id="Email" required value="<?= $mhs["Email"] ?>">
            </li>
            <li>
                <label for="Gambar"> PHOTO : </label>
                <img src="img/<?= $mhs["Gambar"] ?>" width="40">
                <input type="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>